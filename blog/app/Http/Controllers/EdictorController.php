<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use App\Http\Requests\RegisterRequest;

use Hash;
use DB;

class EdictorController extends Controller
{
    //
     public function edictor(RegisterRequest $request)
    {
    	var_dump($request);
    	die;
    	// return view('home.register');
    }

}
