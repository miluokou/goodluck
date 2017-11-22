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
use Mail;

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
    public function doRegister(Request $request)
    {
        $validate = Validator::make($request->input(),
            [
            //required 是必填项的意思
                'name' =>'required|unique:user|min:3|max:100',
                'email'=>'required|email|unique:user_detail',
                'email_vcode'=>'required|',
                'pass'=>'required'
            ],[
                'required' =>':attribute 你忘记填啦',
                'unique' =>':attribute 已经有人用了,换一个',
                'email' =>':attribute 格式不正确',
                'min'=>'最少3个字母',
                'max'=>"不能超过100个字母"
            ],[
                'name' =>'这个名字',
                'pass' => '密码',
                'email'=>'邮箱',
                'email_vcode' =>'邮箱验证码'
            ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        // var_dump('1231');
        // // $request
        // die;
        $data=[];
        $input = $request->all();
                      $data['name']=$input['name'];
                $data['pass'] = $input['pass'];
                $res=DB::table('user')->insert($data);
                if($res){
                    Session::flash('info','注册成功');
                    return redirect('/index');
                }else{
                    Session::flash('info','注册失败');
                    return redirect('/index');
                }
            
        }
    public function send(Request $request){
        $input = $request->all();
        // $captcha['session_vcode'] = Session::get('vcode');
        $captcha['input'] = $input;
        $captcha['session_vcode'] =Session::get('vcode');
        // $captcha['email_vcode'] = empty($input['email_vcode']);
        // if(empty($input['email_vcode'])){
            // if($input['vcode']== $captcha['session_vcode']){
        // var_dump($input);
        // die;
                $rand = rand(100000,999999);
                Session::flash('rand',$rand);
                    Mail::send("感谢注册 米洛口·光潜 您的验证码为:".$rand."",$input,function($message) use($input){
                        // $email =$input['email'];
                        $message->subject('来自米洛口·光潜邮箱注册验证码');
                        $message->to($input['email']);
                    }); 
                echo json_encode(array('state'=>true,'info'=>$captcha));
            // }else{
            //     echo json_encode(array('state'=>false,'info'=>$captcha));
            // }
        // }else{
        //     $session_rand = Session::get('rand');
        //     if($session_rand == $input['rand']){
        //         echo json_encode(array('state'=>true,'info'=>'email compared'));
        //     }else{
        //         echo json_encode(array('state'=>true,'info'=>'email uncompared'));
        //     }
        // }
    }
}
