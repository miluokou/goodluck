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
Route::get('/edictor', function(){
    // return view('welcome');
    return view('home.edictor');
});
Route::post('edictor/post','EdictorController@edictor');
Route::post('edictor/edit','EdictorController@edit');
Route::get('home/article/{id}','EdictorController@show');
// Route::get('home/article','EdictorController@show');

// Route::get('home/article', function () {
//    return view('home.article');
// });
// Route::get('home/center', function () {
//    return view('home.center');
// });
Route::post('/send','LoginController@send');
Route::post('/login','LoginController@login');

Route::post('/addcate','CenterController@addcate');
Route::get('home/center','CenterController@center');
Route::get('/center','CenterController@index');
Route::post('/editcate','CenterController@editcate');



