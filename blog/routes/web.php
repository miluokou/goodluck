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
Route::post('/edictor/update','EdictorController@article_update');
Route::post('/edictor/view_count','EdictorController@view_count');

Route::get('home/article/{id}','EdictorController@show');
Route::post('/edictor/show_list','EdictorController@show_list');
Route::post('/get_token','EdictorController@get_token');
Route::post('/send','LoginController@send');
Route::post('/login','LoginController@login');

Route::post('/addcate','CenterController@addcate');
Route::get('home/center','CenterController@center');
Route::get('/center','CenterController@index');
Route::post('/editcate','CenterController@editcate');

Route::post('/edit_t','EdictorController@edit_title');
Route::post('/token_yanzheng','ArticleController@token_yanzheng');
Route::post('/article/delete','ArticleController@article_delete');
Route::post('/article/public','ArticleController@article_public');



// token_yanzheng



