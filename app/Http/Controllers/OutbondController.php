<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\OutbondLogistic;
use App\Models\Supplier;
use Illuminate\Http\Request;
class OutbondController extends Controller
{
    public function viewCreate()
    {
        $barang = Material::all();
        $supplier = Supplier::all();
        return view('outbond.create')->with(compact('barang', 'supplier'));
    }
    public function viewManage()
    {
        $barang = Material::all();
        $supplier = Supplier::all();
        $datas = BarangKeluar::all();
        return view('outbond.manage')->with(compact('barang', 'supplier', 'datas'));
    }

    public function cancelKeluar($id)
    {
        $object = BarangKeluar::find($id);
        $barang = Material::find($object->id_barang);
        $barang->stock += $object->jumlah;
        $barang->save();
        $object->delete();

        if ($object) {
            return back()->with(["success" => "Berhasil Membatalkan Transaksi dan Memulihkan Stok Barang"]);
        } else {
            return back()->with(["error" => "Gagal Membatalkan Transaksi dan Memulihkan Stok Barang"]);
        }
    }

    public function cancelMasuk($id)
    {
        $object = BarangKeluar::find($id);
        $barang = Material::find($object->id_barang);
        $barang->stock -= $object->jumlah;
        $barang->save();
        $object->delete();

        if ($object) {
            return back()->with(["success" => "Berhasil Membatalkan Transaksi dan Memulihkan Stok Barang"]);
        } else {
            return back()->with(["error" => "Gagal Membatalkan Transaksi dan Memulihkan Stok Barang"]);
        }
    }

    public function store(Request $request)
    {
        $object = new BarangKeluar();
        $object->id_barang = $request->barang;
        $object->jumlah = $request->jumlah;

        $barang = Material::findOrFail($request->barang);

        if ($barang->stock < $request->jumlah) {
            return back()->with(["error" => "Stock Barang Tidak Cukup"]);
        }

        $barang->stock -= $request->jumlah;


        $object->save();
        $barang->save();

        if ($object) {
            return back()->with(["success" => "Berhasil Menyimpan Transaksi Keluar dan Mengurangi Stok Barang"]);
        } else {
            return back()->with(["error" => "Gagal Menyimpan Transaksi Keluar dan Mengurangi Stok Barang"]);
        }
    }
}
