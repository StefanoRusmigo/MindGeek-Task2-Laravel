<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatroom;
use App\User;

class ChatroomController extends Controller
{

    public function __construct()
    {
            $this->middleware('auth');
    }

    public function join(){
    	$chatroom = Chatroom::find(request('chatroom_id'));
    	$user = User::find(\Auth::id());
    	if($user && $chatroom){
    		$user->chatrooms()->attach($chatroom);
    		$user->save();
    		return redirect('/');
    	}


    }

    public function leave(){
    	$chatroom = Chatroom::find(request('chatroom_id'));
    	$user = User::find(\Auth::id());
    		if($user && $chatroom){
	    		$user->chatrooms()->detach($chatroom);
	    		$user->save();
	    		return redirect('/');
    		}
    }

    public function show($id){
    	$chatroom = Chatroom::find($id);
        $user = User::find(\Auth::id());
        if($user->chatrooms->contains($chatroom)){
            return view('/chatroom/show', compact('chatroom'));
        }
        else{
            return redirect('/');
        }

    }
}
