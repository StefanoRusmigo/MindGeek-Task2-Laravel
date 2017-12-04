<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/join_chatroom',  'ChatroomController@join')->name('join_chatroom');
Route::post('/leave_chatroom', 'ChatroomController@leave')->name('leave_chatroom');
Route::get('/chatroom/{id}',  'ChatroomController@show');

Route::post('/create_message','MessageController@create');
Route::post('/create_system_message','MessageController@systemCreate');




