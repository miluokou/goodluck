<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeIndexController extends Controller
{
    //首页路由
    public function index()
    {
        $total = DB::table('user')->count();
     //    echo '<pre>';
     //    var_dump($total);
     //    die;
    	$contents='';

    	return view('home.index',['total'=>$total,'contents'=>$contents]);
    }
}
