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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing');
});

// Namespace Means folder for controllers 
Route::group(['namespace' =>'Front','prefix'=>'users','middleware'=>'auth'],function(){
	// all Routes only access to folder name's Front
	Route::get('/',function(){
		return 'working';
	});
	Route::get('/show','UserController@showUsername');
});

Route::group(['namespace' => 'Admin'],function(){
	Route::get('second','SecondController@showString');
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
