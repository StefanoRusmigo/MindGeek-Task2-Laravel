<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function type(){
    	return $this->belongsTo(MessageType::class,'message_type_id');
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function chatroom(){
    	return $this->belongsTo(Chatroom::class);
    }
}
