<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

class Chatroom extends Model
{
    public function users(){
    	return $this->belongsToMany('App\User','chatroom_user');
    }

    public function messages(){
    	return $this->hasMany(Message::class);
    }

    public function allMessages(){
    	$messages = $this->messages;

    	$system_mes = Message::where('message_type_id',	 2)->get();
    	 foreach($system_mes as $mes){

    	 	 $messages[]= $mes;
    	 }

    	 $messages = $messages->sortByDesc('created_at');
    	 return $messages;
    }
}
