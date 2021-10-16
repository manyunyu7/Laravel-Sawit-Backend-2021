<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\RequestSell;
use App\Models\RsScale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RsScaleController extends Controller
{


    public function store(Request $request, $id)
    {
        $rs = RequestSell::find($id);
        $created_by = User::find($request->created_by);

        if (Auth::user()->role == 3) {
            return response()->json([
                'message' => "Access Restricted"
            ], 400);
        }

        if ($created_by == null)
            return RazkyFeb::error(400, "Pegawai Tidak Valid");

        if ($rs == null)
            return RazkyFeb::error(400, "Transaksi Tidak Sedang Ditimbang");


        $object = new RsScale();
        $object->rs_id = $id;
        $object->result = $request->result;
        $object->created_by = $created_by->id;

        if ($object->save()) {
            return RazkyFeb::success(200, "Berat Berhasil Diinput");
        } else {
            return RazkyFeb::error(400, "Berat Gagal Diinput");
        }
    }

    public function getByID(Request $request, $id)
    {
        $rsScaleData = RsScale::where('rs_id', '=', $id)->orderBy('id', 'DESC')->get();
        $totalWeight = 0.0;
        foreach ($rsScaleData as $item) {
            $totalWeight += $item['result'];
        }

        $data = array(
            "total_weight" => $totalWeight,
            "data" => $rsScaleData,
        );

        return RazkyFeb::responseSuccessWithData(
            200, 1, 1,
            "Success", "Success", $data
        );
    }

    public function getAll(Request $request)
    {
        return RsScale::all();
    }

    public function destroy($id_scale)
    {
        $object = RsScale::find($id_scale);
        if ($object == null)
            return RazkyFeb::error(400, "Tidak Ditemukan");

        if ($object->delete())
            return RazkyFeb::success(200, "Berhasil Menghapus Data");
        else
            return RazkyFeb::error(400, "Gagal Menghapus Data");
    }


}
