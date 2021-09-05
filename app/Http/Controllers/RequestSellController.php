<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\MappingRequestSellPhoto;
use App\Models\Price;
use App\Models\RequestSell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestSellController extends Controller
{
    /**
     * store the request sell
     *
     */
    public function store(Request $request)
    {
        $rules = [
            'additional_contact' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'est_weight' => 'required|numeric',
            'address' => 'required',
            'contact' => 'required',
            'status' => 'required',
            'upload_file' => 'required',
            'upload_file.*' => 'mimes:jpeg,png,jpg,gif,svg,png|max:12048',
        ];

        $customMessages = [
            'required' => 'Mohon Isi Kolom :attribute terlebih dahulu'
        ];
        $this->validate($request, $rules, $customMessages);

        $latestPriceObject = Price::latest()->first();
        $latestPrice = 0;
        $latestMargin = 0;

        if ($latestPriceObject != null) {
            $latestPrice = $latestPriceObject->price;
            $latestMargin = $latestPriceObject->margin;
        }

        $image = $request->file('upload_file');

        //ARRAY FOR SAVING IMAGE
        $dataFile = array();

        foreach ($image as $files) {
            $destinationPath = 'web_files/request_sell/';
            $file_name = $request->user . "_" . uniqid() . $files->getClientOriginalName();
            if ($files->move($destinationPath, $file_name))
                $dataFile[] = $destinationPath . $file_name;

        }


        $data = new RequestSell();

        $data->user_id = Auth::id();
        $data->driver_id = null;
        $data->staff_id = null;
        $data->est_weight = $request->est_weight;
        $data->est_price = $latestPrice;
        $data->est_margin = $latestMargin;
        $data->address = $request->address;
        $data->lat = $request->lat;
        $data->long = $request->long;
        $data->contact = $request->contact;
        $data->status = $request->status;


        if ($data->save()) {

            foreach ($dataFile as $itemPhoto) {
                //Save Image into MappingRequestSellPhoto;
                $mapping = new MappingRequestSellPhoto();
                $mapping->request_sell_id = $data->id;
                $mapping->path = $itemPhoto;
                $mapping->save();
            }


            if (str_contains(url()->current(), 'api/')) {
                return RazkyFeb::responseSuccessWithData(
                    200,
                    1,
                    1,
                    "Request Jual Berhasil",
                    "Sell Request Success",
                    array("SellRequest" => $data)
                );
            } else {
                return redirect("$request->redirectTo")->with(['success' => "Request Jual Berhasil"]);
            }

        } else {
            if (str_contains(url()->current(), 'api/')) {
                return response()->json([
                    'http_response' => 400,
                    'status' => 0,
                    'message_id' => 'Request Jual Gagal',
                    'message' => 'Sell Request has Failed',
                ]);
            } else {
                return redirect("$request->redirectTo")->with(['error' => "Request Jual Berhasil"]);
            }
        }
    }

    public function getByUser($id, Request $request)
    {
        $perPage = $request->per_page;
        if ($request->per_page == null) {
            $perPage = 10;
        }

        $datas = RequestSell::where('user_id', '=', $id)->simplePaginate($perPage);
        // if request doesnt containt ?paginate=true
        // then show all data directly

        $tesBillion = array();
        if ($request->is_paginate == null) {
            $datas = RequestSell::where('user_id', '=', $id)->get();
        }

        for ($i = 0; $i < 10000; $i++) {
            array_push($tesBillion, $datas);
        }

        return $tesBillion;
    }
}
