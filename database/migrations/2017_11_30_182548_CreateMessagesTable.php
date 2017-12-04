<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('content');
            $table->integer('message_type_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('message_type_id')->references('id')->on('message_types');
            $table->integer('chatroom_id')->unsigned()->nullable();
            $table->foreign('chatroom_id')->references('id')->on('chatrooms');
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
        Schema::dropIfExists('messages');
    }
}
