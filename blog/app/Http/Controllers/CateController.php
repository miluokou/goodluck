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

class CateController extends Controller
{
    //
     public function register()
    {
    	return view('home.register');
    }
    public function doRegister(Request $request)
    {
        $validate = Validator::make($request->input(),
            [
            //required 是必填项的意思
                'name' =>'required|unique:user|min:1|max:100',
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
                $data['token'] = $input['_token'];
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
        // $captcha['session_vcode'] =Session::get('vcode');
        // $captcha['email_vcode'] = empty($input['email_vcode']);
        if(empty($input['email_vcode'])){
            // if($input['vcode']== $captcha['session_vcode']){
                $rand = rand(100000,999999);
                Session::flash('rand',$rand);
                $email =$input['email'];
                    // Mail::to($email);
                $data = ['email'=>$email, 'name'=>'miluokou'];
                Mail::send('activemail', $data, function($message) use($data)
                {
                    $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站,您的邮件验证码');
                });
                echo json_encode(array('state'=>true,'info'=>$captcha));
            // }else{
            //     echo json_encode(array('state'=>false,'info'=>$captcha));
            // }
        }else{
            $session_rand = Session::get('rand');
            // var_dump($session_rand);
            // var_dump($input['email_vcode']);
            // die;
            if($session_rand == $input['email_vcode']){
                echo json_encode(array('state'=>true,'info'=>'email compared'));
            }else{
                echo json_encode(array('state'=>false,'info'=>'email uncompared'));
            }
        }
    }
    public function addcate(Request $request){
        //  $validate = Validator::make($request->input(),
        //     [
        //     //required 是必填项的意思
        //         'login_name' =>'required|exists:user,name|min:3|max:100',
        //         'login_pass'=>'required'
        //     ],[
        //         'required' =>':attribute 你忘记填啦',
        //         'min'=>'最少3个字母',
        //         'max'=>"不能超过100个字母",
        //         'exists'=>"用户不存在"
        //     ],[
        //         'name' =>'这个名字',
        //         'pass' => '密码',
        //     ]);
        // if($validate->fails()){
        //     return redirect()->back()->withErrors($validate)->withInput();
        // }
        $input = $request->all();
        // var_dump($input);
        // die;
        $data=array();
        $data['pid']=$input['cate_father'];
        $data['name']=$input['cate_name'];
        // var_dump($data);
        // die;
        if(!empty($data)){
        	$res = DB::table('cate')->insert($data);
        }
        if($res){
        	echo "添加成功";
        }else{
        	echo "添加分类失败";
        }
    }

}
