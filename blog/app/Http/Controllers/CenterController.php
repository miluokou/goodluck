<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use APP;
use App\Cate;


//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Hash;
use DB;
use Validator;
use Mail;

class CenterController extends Controller
{
    //
    public function index()
    {
         // $user = DB::table('cate')->where('name', $username)->first();
        //  $cates = DB::table('cate')->get();
        //  foreach ($cates as $key => $value) {
        //     $cate[$key]=$value->name;
        //      // var_dump($value);
             
        //  }
        //  // echo '<pre>';
        //  //     var_dump($cate);
        //  //     die;
        // echo json_encode(array('state'=>false,'info'=>$cate));
        return view('home.center');
    }
     public function center()
    {
         // $user = DB::table('cate')->where('name', $username)->first();
         // $cates = DB::table('cate')->get();
         // foreach ($cates as $key => $value) {
         //    // $key=$key+1;
         //    $cate[$key]=$value->name;
         //     // var_dump($value);
             
         // }
          $res = DB::table('cate')->
        select(DB::raw('*,concat(path,",",id) as paths'))->
        orderBy('paths')->get();
        $catee = new Cate();  
        $res_array = $catee->object1array($res);
        
        foreach ($res_array as $key => $value) {
            $res_array[$key]=$catee->object2array($value);
        }
        $tree = $catee->getTree($res_array,0);
        echo json_encode(array('state'=>false,'info'=>$tree));
    }
    
    public function getTree($data, $field_id, $field_pid, $pid = 0) {
        $arr = array();
        foreach ($data as $k=>$v) {
            if ($v->$field_pid == $pid) {
                $arr[$k] = $v;
                $arr[$k]['fillable'] = self::getTree($data, $field_id, $field_pid, $v->$field_id );
            }
        }
        return $arr;
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
        $input = $request->all();
        $data=array();
        $data['pid']=$input['cate_father'];
        $data['name']=$input['cate_name'];
        // var_dump($data);
        // die;
        if($data['pid']==0){ 
            $data['path']='0,'.$data['pid'];
        }else{
            $res = DB::table('cate')->where('id',$data['pid'])->first();
            //拼接path
            $data['path'] = $res->path.','.$res->id;
        }
        // var_dump($data);
        // die;    
        $res2 = DB::table('cate')->insert($data);
        if($res2){
            return redirect('/center')->with('添加成功');
        }else{
            return redirect('/center')->with('添加失败');
        }
    }

}
