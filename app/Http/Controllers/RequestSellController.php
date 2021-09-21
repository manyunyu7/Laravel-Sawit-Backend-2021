<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\MappingRequestSellPhoto;
use App\Models\News;
use App\Models\Price;
use App\Models\RequestSell;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestSellController extends Controller
{

    /**
     * Show the form for managing existing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewManage()
    {
        $datas = RequestSell::all();
        return view('requestsell.manage')->with(compact('datas'));
    }

    /**
     * Show the edit form for editing armada
     *
     * @return \Illuminate\Http\Response
     */
    public function viewDetail($id)
    {
        $data = RequestSell::findOrFail($id);
        $user_data = User::findOrFail($data->user_id);
        $driver_data = User::find($data->driver_id);
        $staff_data = User::find($data->staff_id);

        $retVal = compact('data','user_data',
            'staff_data','driver_data');
//        return $retVal;
        return view('requestsell.edit')->with($retVal);
    }

    /**
     * store the request sell
     *
     */
    public function store(Request $request)
    {
        $rules = [
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

            $counter = 1;
            foreach ($dataFile as $itemPhoto) {

                //Save Image into MappingRequestSellPhoto;
                $mapping = new MappingRequestSellPhoto();
                $mapping->request_sell_id = $data->id;
                $mapping->path = $itemPhoto;
                $mapping->save();

                //Save First PHOTO AS SAMPUL
                if ($counter == 1) {
                    $objectRS = $data;
                    $data->photo = $itemPhoto;
                    $data->save();
                }
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
        $status = $request->status;
        $perPage = $request->per_page;
        if ($request->per_page == null) {
            $perPage = 10;
        }

        // Check if id is all
        if ($id == "all") {
            // Check if status filter is not null
            if ($status != null) {
                $datas =
                    RequestSell::
                    where('status', '=', $status)
                        ->orderBy('id', 'desc')
                        ->simplePaginate($perPage);
            } else {
                //will executed if filter is null
                $datas = RequestSell::orderBy('id', 'desc')->simplePaginate($perPage);
            }
        } else {
            if ($status != null) {
                $datas =
                    RequestSell::
                    where('status', '=', $status)
                        ->where('user_id', '=', $id)
                        ->where('status','=',$status)
                        ->orderBy('id', 'desc')
                        ->simplePaginate($perPage);
            } else {
                $datas = RequestSell::where('user_id', '=', $id)
                    ->orderBy('id', 'desc')->simplePaginate($perPage);
            }

        }

        // if request doesnt containt ?paginate=true
        // then show all data directly
        if ($request->is_paginate == null) {

            // Check if id is all
            if ($id == "all") {
                $datas = RequestSell::orderBy('id', 'desc')->get();
            } else {
                $datas = RequestSell::where('user_id', '=', $id)->orderBy('id', 'desc')->get();
            }

        }

        return $datas;
    }

}
