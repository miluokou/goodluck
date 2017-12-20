<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Hash;
use DB;
use Validator;

class EdictorController extends Controller
{
    //
     public function edictor(Request $request)
    {
    	$input = $request->all();
    	var_dump($input);
    	die;
    	// return view('home.register');
    }

}
