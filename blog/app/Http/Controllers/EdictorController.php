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
// use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class EdictorController extends Controller
{
    //
     public function edictor(Request $request)
    {
    	$input = $request->all();
    	if(!empty($input['cate_father'])){
    		$cate_id= $input['cate_father'];
    	}else{
    		// $cate_id='0';
    		$info[]="一级类名没有选择";
    	}
    	if(!empty($input['cate_father1'])){
    		$cate_id= $input['cate_father1'];
    	}else{
    		$info[]="二级类名没有选择";
    	}
    	if(!empty($input['cate_father2'])){
    		$cate_id= $input['cate_father2'];
    	}else{
    		$info[]="二级类名没有选择";
    	}
    	if(empty($input['editorValue"'])){
    		$info[]="编辑内容不能为空";
    	}
        echo json_encode(array('info'=>$info));      
    }
    public function edit(Request $request){
        $input = $request->all();
        $validate = Validator::make($request->input(),
            [
            //required 是必填项的意思
                'title' =>'required|unique:article|min:1|max:100',
                'content'=>'required|unique:article',
            ],[
                'required' =>':attribute 你忘记填啦',
                'unique' =>':attribute 已经有这个标题了,换一个',
                'min'=>'最少1个字',
                'max'=>"不能超过100个字母"
            ],[
                'title' =>'标题',
                'content'=>'内容',
            ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // echo '<pre>';
        // var_dump($input);
       //前面应该验证一下
        if(!empty($input['cateselect'])){
            $pid = $input['cateselect'];
        }else{
            echo "param miss";
            die;
        }
        if(!empty($input['cateselect2'])){
            $pid = $input['cateselect2'];
        }
        if(!empty($input['cateselect3'])){
            $pid = $input['cateselect3'];
        }
        if(!empty($input['content'])){
            $content = $input['content'];
        }else{
            $content="内容为空";
        }
        if(!empty($input['title'])){
            $title = $input['title'];
        }
//          var_dump($pid);
//          var_dump($title);
// //          var_dump($content);
// die;
        $id = DB::table('article')->insertGetId(
            ['pid' => $pid, 'title' => $title]
        );

        // $id = DB::table('article')->insert(
        //     ['pid' => $pid, 'title' =>$title]
        // );

         // $id = DB::table('article')->insertGetId(
         //    ['pid' => $pid, 'title' => $title]);
         // var_dump($id);
         // die;
         $file_name = date("Ymd");
         $res =DB::table('article')
        ->where('id', $id)
        ->update(['content' => $file_name.'/'.$id.'.txt']);

        if($res){
            $res2 = Storage::disk('local')->put($file_name.'/'.$id.'.txt', $content);
            // $exists = Storage::disk('s3')->exists($file_name.'/'.$id.'.txt');
        // Storage::move('20180108/file2.txt', '/20180108/file2.txt');
            // var_dump($res2);
            // die;
            if( $res2){
             echo json_encode(array('state'=>true,'info'=>'发布成功','id'=>$id));      
            }else{
             echo json_encode(array('state'=>false,'info'=>'内容保存失败'));      
            }
        }else{
             echo json_encode(array('state'=>false,'info'=>'内容写入失败'));      
        }
    }
    public function show($id){
        // var_dump($id);
        if(empty($id)){
            $articles = DB::table('article')->get();
            $articles2=array();
            foreach ($articles as $key => $value) {
                if(!empty($value->content)){
                   $articles2[$key]=$value;
                # code... 
                }
            }
            // echo '<pre>';
            // var_dump($articles2);
            // die;
            $contents="";
            return view('home.article',['articles2'=>$articles2,'contents'=>$contents]);
        }else{
            $articles = DB::table('article')->get();
            $articles2=array();
            foreach ($articles as $key => $value) {
                if(!empty($value->content)){
                   $articles2[$key]=$value;
                # code... 
                }
            }
            $articles = DB::table('article')->where('id',$id)->first();
            // var_dump($articles->title);
            // die;
            $contents = Storage::get($articles->content);
            return view('home.article',['article_title'=>$articles->title,'articles2'=>$articles2,'contents'=>$contents]);
        }
    }
}
