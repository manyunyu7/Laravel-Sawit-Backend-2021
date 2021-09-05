<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMappingRequestSellPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapping_request_sell_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("request_sell_id");
            $table->foreign("request_sell_id")->references("id")->on("request_sells")->onDelete("cascade");
            $table->string("path");
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
        Schema::dropIfExists('mapping_request_sell_photos');
    }
}
