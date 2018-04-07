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
        return view('home.center');
    }
     public function center()
    {
       
        $res=DB::table('cate')->get();

        $res2 = DB::table('cate')->
        select(DB::raw('*,concat(path,",",id) as paths'))->
        orderBy('paths')->get();
        foreach($res2 as $k2=>$v2)
        {
            //通过path 分辨是几级分类
            $path = explode(',',$v2->path);
            //通过,分出分级
            $level=count($path)-1;
            //根据等级添加|--
            $v2->name = str_repeat('|--',$level).$v2->name;
            // $v->name
        }
        
        $catee = new Cate();  
        $res_array = $catee->object1array($res);

        foreach ($res_array as $key => $value) {
            $value->children=$value->pid;
            $value->value=$value->id;
            unset($value->pid);
            unset($value->id);
            $res_array[$key]=$catee->object2array($value);
        }
        // var_dump($catee);
        $tree =$catee->getTree($res_array,0);
        
        echo json_encode(array('name'=>"首页",'children'=>$tree,'res2'=>$res2));
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
    public function editcate(Request $request){
        date_default_timezone_set('PRC');
        // echo '<pre>';
        $input = $request->all();
        
        $id=$input['cateselect4'];
        $edit_cate_name=$input['cate_name'];
        $username2=$input['username'];
        $time= date('Y-m-d h:i:s',time());
        // var_dump($time);
        // die;
        if(empty($id) || empty($username2) || empty($edit_cate_name)){
            echo json_encode(array('state'=>false,'info'=>'添加失败'));
                die;
        }
        $res=DB::table('cate')
        ->where('id', $id)
        ->update(['name' => $edit_cate_name,'last_one'=>$username2,'last_time'=>$time]);

        if($res){
            // return redirect('/center')->with('添加成功');
            echo json_encode(array('state'=>true,'info'=>'添加成功'));

        }else{
            echo json_encode(array('state'=>false,'info'=>'添加失败'));
            // return redirect('/center')->with('添加失败');
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
            $data['path']='0';
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
