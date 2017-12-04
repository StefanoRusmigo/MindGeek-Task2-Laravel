<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatroom;
use App\Message;
use App\User;

class MessageController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $this->validate(request(), ['message'=>'required|min:2']);

    	$chatroom = Chatroom::find(request('chatroom_id'));
    	$user = User::find(\Auth::id());

    	$message = new Message;
    	$message->content = request('message');
    	$message->type()->associate(1);
    	$message->user()->associate($user);
    	$message->chatroom()->associate($chatroom);
    	$message->save();

    	return redirect('chatroom/'.$chatroom->id);
    }

    public function systemCreate(){
        $this->validate(request(), ['message'=>'required|min:2']);

        $user = User::find(\Auth::id());
        if($user->role->name == 'Admin'){
            $message = new Message;
            $message->content = request('sys_message');
            $message->type()->associate(2);
            $message->user()->associate($user);
            $message->save();
        }
        return redirect('/');

    }
}
