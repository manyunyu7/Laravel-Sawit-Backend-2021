<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_scales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rs_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign("created_by")->references("id")->on("users")->onDelete("cascade");
            $table->foreign('rs_id')->references('id')->on('request_sells')->onDelete('cascade');
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
        Schema::dropIfExists('rs_scales');
    }
}
