<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeIndexController extends Controller
{
    //首页路由
    public function index()
    {
    	return view('home.index');
    }
}
