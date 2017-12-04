<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        $types = array(
            array('name'=>'Standard', 'description'=> 'Can be sent to a chatroom immediately only from a user who is already in the chatroom.' ),
            array('name'=>'System', 'description'=> 'Can only be sent by an Admin, to all available chatrooms, can be sent immediately or scheduled to be sent at a later time.' ),
        );

        DB::table('message_types')->insert($types);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_types');
    }
}
