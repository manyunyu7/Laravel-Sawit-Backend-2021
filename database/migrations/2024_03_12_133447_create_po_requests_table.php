<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_requests', function (Blueprint $table) {
            $table->id();
            $table->string("nomor_surat_jalan")->nullable();
            $table->string("nomor_surat_jalan_date")->nullable();
            $table->string("order_reference")->nullable();
            $table->string("order_penjualan_nomor")->nullable();
            $table->dateTime("order_penjualan_nomor_date")->nullable();
            $table->string("po_number")->nullable();
            $table->text("comment_customer")->nullable();
            $table->text("comment_commercial")->nullable();
            $table->text("comment_warehouse")->nullable();
            $table->text("comment_ekspedisi")->nullable();
            $table->text("dijual_kepada")->nullable();
            $table->text("dikirim_ke")->nullable();
            $table->text("alamat_pengambilan")->nullable();
            $table->text("penerima")->nullable();
            $table->json('products')->nullable();
            $table->unsignedBigInteger("disiapkan_oleh")->nullable();
            $table->unsignedBigInteger("gudang_pengambilan_barang")->nullable();
            $table->unsignedBigInteger("ekspedisi")->nullable();
            $table->unsignedBigInteger("id_armada")->nullable();
            $table->unsignedBigInteger("id_driver")->nullable();
            $table->integer("last_process_by")->nullable();
            $table->foreign('id_armada')->references('id')->on('trucks');
            $table->foreign('id_driver')->references('id')->on('users');
            $table->foreign('disiapkan_oleh')->references('id')->on('users');
            $table->foreign('gudang_pengambilan_barang')->references('id')->on('users');
            $table->foreign('ekspedisi')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_requests');
    }
}
