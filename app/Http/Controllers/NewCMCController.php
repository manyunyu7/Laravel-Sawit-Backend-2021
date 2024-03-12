<?php

namespace App\Http\Controllers;

use App\Models\PoRequest;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewCMCController extends Controller
{

    public function editCMCView(Request $request,$id){
        $data = PoRequest::findOrFail($id);
        $ekspedisiList = Truck::all();
        $users = User::all();
        return view('cmc.edit')->with(compact('data','ekspedisiList','users'));
    }

    public function myRequestView(Request $request){
        $datas = PoRequest::where('disiapkan_oleh','=',Auth::id())->get();
        return view('cmc.customer.my_request')->with(compact('datas'));
    }

    public function newRequest(Request $request){
        $ekspedisiList = Truck::all();
        $compact = compact('ekspedisiList');
        return view('cmc.customer.new_request')->with($compact);
    }

    public function storeNewRequest(Request $request){
        $poRequest = new PoRequest(); // Replace with your actual model

        $poRequest->nomor_surat_jalan = $request->input('nomor_surat_jalan');
        $poRequest->nomor_surat_jalan_date = $request->input('nomor_surat_jalan_date');
        $poRequest->order_reference = $request->input('order_reference');
        $poRequest->order_penjualan_nomor = $request->input('order_penjualan_nomor');
//        $poRequest->order_penjualan_nomor_date = $request->input('order_penjualan_nomor_date');
        $poRequest->ekspedisi = $request->input('ekspedisi');
        $poRequest->alamat_pengambilan = $request->input('alamat_pengambilan');
        $poRequest->dijual_kepada = $request->input('dijual_kepada');
        $poRequest->dikirim_ke = $request->input('dikirim_ke');
        $poRequest->comment_customer = $request->input('comment_customer');
        $poRequest->disiapkan_oleh = Auth::id();

        // Serialize and store the products
        $products = [];

        foreach ($request->input('kode_produk') as $key => $kodeProduk) {
            $products[] = [
                'kode_produk' => $kodeProduk,
                'uraian' => $request->input('uraian')[$key],
                'jumlah' => $request->input('jumlah')[$key],
                'unit' => $request->input('unit')[$key],
                'berat_kotor' => $request->input('berat_kotor')[$key],
                'volume' => $request->input('volume')[$key],
            ];
        }

        $poRequest->products = json_encode($products);

        // Save the data
        if ($poRequest->save()) {
            return back()->with(["success" => "Data saved successfully"]);
        } else {
            return back()->with(["error" => "Saving process failed"]);
        }

    }

}
