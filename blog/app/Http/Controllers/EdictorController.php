<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Edit;

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
        // var_dump($input);
        // die;
        $validate = Validator::make($request->input(),
            [
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
        $arr=array();
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
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
            $arr['title']=$title;
        }
        if(!empty($input['token'])){
            $token = $input['token'];
            $arr['token']=$token;
        }else{
            $token ='token miss';
            $arr['token']=$token;
        }
        if(!empty($input['uid'])){
            $arr['uid']=$input['uid'];
        }
        $arr['pid']=$pid;
        $arr['pingfen']=0;
        
        $id = DB::table('article')->insertGetId($arr);
         $file_name = date("Ymd");
         $time = date("Y-m-d H:i:s",time());
         $res =DB::table('article')
        ->where('id', $id)
        ->update(['content' => $file_name.'/'.$id.'.txt','time'=>$time]);
        if($res){
            $res2 = Storage::disk('local')->put($file_name.'/'.$id.'.txt', $content);
            if( $res2){
             echo json_encode(array('state'=>true,'info'=>'发布成功','id'=>$id));      
            }else{
             echo json_encode(array('state'=>false,'info'=>'内容保存失败'));      
            }
        }else{
             echo json_encode(array('state'=>false,'info'=>'内容写入失败'));      
        }
    }
    public function article_update(Request $request){
        $input = $request->all();
        $id = $input['article_id'];
        $res = DB::table('article')->where('id',$id)->get();
        // $res[0]->token
        $token = $input['token'];
        if(!empty($input['content']) && $token==$res[0]->token){
            $res2 = Storage::delete($res[0]->content);
            if($res2){
                $res3 = Storage::disk('local')->put($res[0]->content,$input['content']);
                $time = date("Y-m-d H:i:s",time());
                 // var_dump($time);
                 // die;
                 $res4 =DB::table('article')
                ->where('id', $id)
                ->update(['time'=>$time,'token'=>$token]);
                if($res3 && $res4){
                    echo json_encode(array('state'=>false,'info'=>'内容更新成功'));      
                }else{
                    echo json_encode(array('state'=>false,'info'=>'内容更新失败'));      
                }
            }
        }else{
            echo 'content 不存在';
        }

    }
    public function show_list(Request $request){
        $input = $request->all();
        
            $articles = DB::table('article')->get();
            $articles_detial = DB::table('article_detail')->get();

            foreach ($articles as $key => $value) {
                foreach ($articles_detial as $key2 => $value2) {
                    if(!empty($value2->public)){
                        // echo $value2->article_id;
                        // die;
                        if($value->id==$value2->article_id){
                             // var_dump($value->id);
                             $value->public = $value2->public;
                        }
                     }
                }
            }
            // echo '<pre>';
            // var_dump($articles);
            // die;
            $cates = DB::table('cate')->get();
             foreach ($cates as $ckey => $cvalue) {
                $cates2[$cvalue->id]=$cvalue->name;
            }
             $articles2=array();
             foreach ($articles as $key => $value) {
                if(!empty($value->content)){
                    if(!empty($value->public)){
                        $articles2[$cates2[$value->pid]][$value->id]['public']=$value->public;
                    }
                   $articles2[$cates2[$value->pid]][$value->id]['title']=$value->title;
                }
            }
        echo json_encode(array('articles2_new'=>$articles2,'cates'=>$cates2));      
    }
    public function show($id){

        // $content = Hash::make("能记密码？");
        // var_dump($content);
        // die;

            if(strpos($id,'.html')){
                $id = str_replace('.html','',$id);
            }
            // $value = Cookie::get('name');
            // $cookie = Cookie::make('name', 'value', $minutes);
            // $cookie = Cookie::make('name', 'value');
            // $time_token = Hash::make(time());
            // setcookie('uid',$time_token,time()+20);
            // echo $_COOKIE["uid"];
            // die;

            // $articles = DB::table('article')->get();
            $articles = DB::table('article')->get();
            $articles_detial = DB::table('article_detail')->get();
            foreach ($articles as $key => $value) {
                foreach ($articles_detial as $key2 => $value2) {
                    if(!empty($value2->public)){
                        // echo $value2->article_id;
                        // die;
                        if($value->id==$value2->article_id){
                             // var_dump($value->id);
                             $value->public = $value2->public;
                        }
                     }
                }
            }
            // echo '<pre>';
            // var_dump($articles);
            //     die;
            // echo '<pre>';
            // var_dump($articles);
            // die;
            // $public= $articles->public;
            $cates = DB::table('cate')->get();
             foreach ($cates as $ckey => $cvalue) {
                $cates2[$cvalue->id]=$cvalue->name;
            }
                 $articles2=array();
                     foreach ($articles as $key => $value) {
                        if(!empty($value->content)){
                           $articles2[$cates2[$value->pid]][]=$value;
                        }
                    }
             if(empty($id)){
                    $contents=""; 
                    $view=3;
                    return view('home.article',['articles2'=>$articles2,'contents'=>$contents,'article_title'=>'',"article_id"=>$id,'view'=>$view,'public_s'=>""]);
                }else{
                    $articles = DB::table('article')->where('id',$id)->first();
                    // $articles = DB::table('article_de')->where('id',$id)->first();
                    if(!empty($articles->content)){
                         $contents = Storage::get($articles->content);
                         $view= $articles->view;
                         foreach ($articles_detial as $key => $value) {
                            if($value->article_id==$id){
                                 $public_s= $value->public;
                            }else{
                               $public_s=1; 
                            }
                         }
                    }else{
                        $contents="";
                        $view="";
                        $public_s=1;
                    }
                return view('home.article',['articles2'=>$articles2,'contents'=>$contents,'article_title'=>$articles->title,'article_id'=>$id,'view'=>$view,'public_s'=>$public_s]);
            }
    }
    public function edit_title(Request $request){
        $input = $request->all();
          $validate = Validator::make($request->input(),
        [
            'token' =>'exists:article,token',
        ]);
        $users = DB::table('user')->where('token', $input['token'])->first();
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $res =DB::table('article')
        ->where('id', $input['id'])
        ->update(['title' => $input['update_title']]);
        if($res){
             echo json_encode(array('state'=>true,'info'=>$res));
        }else{
             echo json_encode(array('state'=>false,'info'=>$res));
        }
    }
    public function view_count(Request $request){
        $input = $request->all();
        $all = $input['token'].$input['article_id'];
        $article_id = $input['article_id'];
        if(empty($article_id)){
            die;
        }
        if(!empty($_COOKIE["uid"])){
            $uid = $_COOKIE["uid"];
        }
        if(empty($uid) || $uid!=$all){
           setcookie('uid',$all,time()+3600*24); 
        $res =DB::table('article')
        ->where('id', $article_id)->first();
        $view = $res->view;
        $view = $view+1;
        $res =DB::table('article')
        ->where('id', $article_id)
        ->update(['view' => $view]);
        // var_dump($res);
        if(!empty($res)){
            echo 'zhixingle';
        }
        // ->update(['content' => $file_name.'/'.$id.'.txt','time'=>$time]);
        }
        // var_dump('meizhixing');
        echo 'meizhixing';
            // echo $_COOKIE["uid"];
        // var_dump($input);
    }
}
