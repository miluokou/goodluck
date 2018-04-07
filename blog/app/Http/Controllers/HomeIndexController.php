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
        //$res = DB::table('users')->groupBy('sex')->orderBy('id','DESC')->having('sex','=',0)->get();
//$res = DB::table('users')->limit(2,3)->get();
        $users = DB::table('user')->limit(10)->orderBy('rand','ASC')->get();
        foreach ($users as $key => $value) {
                $userss[$value->rand]=$value->name;
        }
            $users_all = DB::table('user')->limit(10000)->get();
            // echo '<pre>';
            // var_dump($users_all);
            foreach ($users_all as $key3 => $value3) {
                $user_array[$value3->id]=$value3->name;
                # code...
            }

        $articles = DB::table('article')->limit(10)->orderBy('pingfen','DESC')->get();
        foreach ($articles as $key2 => $value2) {
            // var_dump($value2);
            if(!empty($user_array[$value2->uid])){
                $article_array[][$value2->title]=$user_array[$value2->uid];
            }else{
                $article_array[][$value2->title]='无名氏';
            }
            // $article_array[$value2->title]=$user_array[$value2->uid];
            // die;
            # code...
        }
        // echo '<pre>';
        // var_dump($article_array);
        // die;
    	$contents='';
    	return view('home.index',['total'=>$total,'contents'=>$contents,'userss'=>$userss,'articles'=>$article_array]);
    }
}
