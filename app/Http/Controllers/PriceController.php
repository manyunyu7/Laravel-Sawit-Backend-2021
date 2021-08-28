<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCreate()
    {
        return view('price.create');
    }

    /**
     * Show the form for managing existing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewManage()
    {
        $datas = Price::all();
        return view('price.manage')->with(compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = [
            'price' => 'required|numeric',
            'margin' => 'required|numeric',
        ];

        $customMessages = [
            'required' => 'Mohon Isi Kolom :attribute terlebih dahulu'
        ];

        $this->validate($request, $rules, $customMessages);

        $store = Price::create([
            'price' => $request->price,
            'margin' => $request->margin / 100,
        ]);

        if ($store) {
            if (str_contains(url()->current(), 'api/')) {
                return response()->json([
                    'http_response' => 200,
                    'status' => 1,
                    'message_id' => 'Harga Sawit Berhasil Diperbaharui',
                    'message_en' => 'Price Updated Successfully',
                ]);
            } else {
                return redirect("$request->redirectTo")->with(['success' => "Harga Sawit Berhasil Diperbaharui"]);
            }
        } else {
            if (str_contains(url()->current(), 'api/')) {
                return response()->json([
                    'http_response' => 400,
                    'status' => 0,
                    'message_id' => 'Harga Sawit Berhasil Diperbaharui',
                    'message' => 'Price Updated Failed',
                ]);
            } else {
                return redirect("$request->redirectTo")->with(['error' => "Harga Sawit Gagal Diperbaharui"]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Material::where('id', '=', $id)->first();
        return view('material.edit')->with(compact('datas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$request)
    {
        $data = Price::findOrFail($id);

        if ($data->delete()) {
            return redirect($request->redirectTo)->with(["success" => "Data deleted successfully"]);
        } else {
            return redirect($request->redirectTo)->with(["error" => "Data deletion fail"]);
        }

    }
}
