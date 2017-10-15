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

class LoginController extends Controller
{
    //
     public function register()
    {
    	return view('home.register');
    }
    //验证码
     public function vcode($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('vcode', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    public function doRegister(RegisterRequest $request)
    {
        //表单请求验证
        //读取验证码
        $captcha = Session::get('vcode');
        $vcode= $request->only('vcode');

        if($vcode['vcode']==$captcha){

            $request->flashExcept('password');
            $res = $request->except('_token','rpassword','vcode');
            $res['password'] = Hash::make($request->input('password'));

            $id = DB::table('user')->insertGetId($res);
            $userdetail['uid'] = $id;
            $data = DB::table('userinfo')->insert($userdetail);

            if($data){
                return redirect('/home/register')->with('info',"添加成功");

            } else {

                return back()->with('info','添加失败');
            }
        }else{
             $request->flashExcept('password');
           return back()->with('info','验证码错误');
        }

    }

}
