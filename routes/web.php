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

Route::get('/channels/cat/{id}', 'ChannelsController@showChannels');
Route::get('/channel/add', 'ChannelsController@addChannel');
Route::post('/channel/check', 'ChannelsController@check');
Route::post('/channel/save', 'ChannelsController@save');
Route::get('/channel/save', 'ChannelsController@save');
Route::get('/channel/{id}', 'ChannelsController@showChannel');
//charts routes
Route::get('/charts/channels', 'ChartsDataController@channelsData');
Route::get('/charts/users', 'ChartsDataController@usersData');

Route::post('channel/vote/{id}', 'ChannelsController@vote');


Route::get('/callback/{provider}', 'SocialAuthController@callback');
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');


//my menu
Route::get('/my_channels', ['uses' => 'ChannelsController@myChannels', 'middleware' => 'auth']);
Route::get('/my_channel/edit/{id}', ['uses' => 'ChannelsController@editMyChannel', 'middleware' => 'auth']);
Route::post('/my_channel/update/{id}', ['uses' => 'ChannelsController@updateMyChannel', 'middleware' => 'auth']);

Route::get('/my_channel/delete/{id}', 'ChannelsController@deleteMyChannel');

//admin routes
Route::get('admin', ['uses' => 'AdminController@index', 'middleware' => 'auth']);
Route::get('admin/settings', ['uses' => 'AdminController@settings', 'middleware' => 'auth']);
Route::post('admin/updateSettings', ['uses' => 'AdminController@updateSettings', 'middleware' => 'auth']);


Route::get('/logout', function() {
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});