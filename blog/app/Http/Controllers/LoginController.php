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
        $input = $request->all();

        echo '<pre>';
        // $data = $request->session()->all();
        $value = $request->session()->get('vcode');
        // var_dump($data);
        if($value!=$input['vcode']){
            Session::flash('info','验证码不正确');
            return redirect('/index');
            die;
        }
        $condition = 'same:'.$value;
        $validate = Validator::make($request->input(),
            [
                'name' =>'required|unique:user|min:1|max:100',
                // 'email'=>'required|email|unique:user_detail',
                // 'email_vcode'=>'required|',
                'pass'=>'required',
                'rpass'=>'same:pass',
            ],[
                'required' =>':attribute 你忘记填啦',
                'unique' =>':attribute 已经有人用了,换一个',
                // 'email' =>':attribute 格式不正确',
                'min'=>'最少3个字母',
                'max'=>"不能超过100个字母",
                'same'=>"两次输入密码不相等"
            ],[
                'name' =>'这个名字',
                'pass' => '密码',
                'rpass' => '确认密码',
                // 'email'=>'邮箱',
                // 'email_vcode' =>'邮箱验证码'
            ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data=[];
        // $input = $request->all();
                $data['name']=$input['name'];
                $data['pass'] = $input['pass'];

                $token = Hash::make($data['name'].time());
                $data['token'] = $token;
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
    public function login(Request $request){
         $validate = Validator::make($request->input(),
            [
            //required 是必填项的意思
                'login_name' =>'required|exists:user,name|min:3|max:100',
                'login_pass'=>'required'
            ],[
                'required' =>':attribute 你忘记填啦',
                'min'=>'最少3个字母',
                'max'=>"不能超过100个字母",
                'exists'=>"用户不存在"
            ],[
                'name' =>'这个名字',
                'pass' => '密码',
            ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $input = $request->all();

        $username = $input['login_name'];
        $userpass = $input['login_pass'];
        if(!empty($username)){
            $user = DB::table('user')->where('name', $username)->first();
            $ser_username = $user->name;
            $ser_userpass = $user->pass;
            $token = $user->token;
            $stauts=$user->status;
            $uid=$user->id;
            $rand = $user->rand;
            if($ser_username == $username && $ser_userpass==$userpass){
                echo json_encode(array('state'=>true,'info'=>$token,'username'=>$username,'status'=>$stauts,'uid'=>$uid,'rand'=>$rand));
            }else{
                echo json_encode(array('state'=>false));
            }
            // if($ser_username==$username && )
        }else{
            echo json_encode(array('state'=>false));
        }
    }

}
