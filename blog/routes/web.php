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
    // return view('welcome');
    return redirect('/index');
});
Route::get('/index','HomeIndexController@index');
Route::get('/home/register','LoginController@register');
Route::post('/home/doRegister','LoginController@doRegister');
Route::get('/home/vcode/{tmp}','LoginController@vcode');
Route::get('/home/edictor', function(){
    // return view('welcome');
    return view('home.edictor');
});
Route::post('home/edictor/post','EdictorController@edictor');
Route::get('home/blade', function () {
   return view('child');
});
Route::get('home/article', function () {
   return view('home.article');
});
Route::post('/send','LoginController@send');

Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');


