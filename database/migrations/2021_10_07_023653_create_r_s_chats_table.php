<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRSChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_s_chats', function (Blueprint $table) {
            $table->id();
            $table->string('message')->nullable();
            $table->string('type')->nullable();
            $table->string('is_deleted')->nullable();
            $table->string('is_send')->nullable();
            $table->string('is_read')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('topic')->nullable();
            $table->unsignedBigInteger('id_sender')->nullable();
            $table->foreign('id_sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('topic')->references('id')->on('request_sells')->onDelete('cascade');
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
        Schema::dropIfExists('r_s_chats');
    }
}
