<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRSHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_s_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rs')->nullable();
            $table->unsignedBigInteger('id_staff')->nullable();
            $table->unsignedBigInteger('id_driver')->nullable();
            $table->unsignedBigInteger('id_truck')->nullable();
            $table->unsignedBigInteger('photo')->nullable();
            $table->string('status')->nullable();
            $table->text('desc')->nullable();
            $table->foreign("id_rs")->references("id")->on("request_sells")->onDelete("cascade");
            $table->foreign("id_staff")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("id_driver")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("id_truck")->references("id")->on("trucks")->onDelete("cascade");
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
        Schema::dropIfExists('r_s_histories');
    }
}
