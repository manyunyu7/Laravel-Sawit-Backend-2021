<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $append = ['det_supplier', 'det_barang'];

    function getDetSupplierAttribute(){
        return Supplier::where('id','=',$this->id_toko)->first();
    }

    function getDetBarangAttribute(){
        return Barang::where('id','=',$this->id_barang)->first();
    }

}
