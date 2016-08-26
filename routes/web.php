<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ChannelsController@index');
Route::get('/', 'ChannelsController@index');

Route::get('/channel/add', 'ChannelsController@addChannel');
Route::post('/channel/check', 'ChannelsController@check');
Route::post('/channel/save', 'ChannelsController@save');
Route::get('/channel/save', 'ChannelsController@save');
Route::get('/channel/{id}', 'ChannelsController@showChannel');

Route::post('channel/vote/{id}', 'ChannelsController@vote');


Route::get('/callback/{provider}', 'SocialAuthController@callback');
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');


//my menu
Route::get('/my_channels', 'ChannelsController@myChannels');
Route::get('/my_channel/edit/{id}', 'ChannelsController@editMyChannel');
Route::post('/my_channel/update/{id}', 'ChannelsController@updateMyChannel');

Route::get('/my_channel/delete/{id}', 'ChannelsController@deleteMyChannel');
