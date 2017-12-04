<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
         'name', 'email', 'password', 'role_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function chatrooms(){
    	return $this->belongsToMany('App\Chatroom','chatroom_user');

    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
}
