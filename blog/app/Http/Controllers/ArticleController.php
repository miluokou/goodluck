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

class ArticleController extends Controller
{
    public function show($id){
	
            $articles = DB::table('article')->get();
            $cates = DB::table('cate')->get();
             foreach ($cates as $ckey => $cvalue) {
                $cates2[$cvalue->id]=$cvalue->name;
            }
        if(empty($id)){
            $articles2=array();
            foreach ($articles as $key => $value) {
                if(!empty($value->content)){
                   $articles2[$cates2[$value->pid]][]=$value;
                }
            }
            $contents="";   
            return view('home.article',['articles2'=>$articles2,'contents'=>$contents,'article_title'=>'']);
        }else{
            $articles2=array();
            foreach ($articles as $key => $value) {
                if(!empty($value->content)){
                   $articles2[$cates2[$value->pid]][]=$value;
                }
            }
            $articles = DB::table('article')->where('id',$id)->first();
            $contents = Storage::get($articles->content);
            return view('home.article',['article_title'=>$articles->title,'article_id'=>$articles->id,'articles2'=>$articles2,'contents'=>$contents]);
        }
    }
    
    public function token_yanzheng(Request $request){
		$input = $request->all();
        $article_id = $input['article_id'];
        $token = $article_id.$input['token'];
		$res = DB::table('article')->where('id',$article_id)->get();
//		var_dump($input);
		if(Hash::check($token, $res[0]->token)){
			echo json_encode(array('show_edit'=>false));
		}else{
			echo json_encode(array('show_edit'=>true));
		}
    }
    public function article_delete(Request $request){
        $input = $request->all();
        $article_id = $input['article_id'];
        $res = DB::table('article')->where('id',$article_id)->first();
        if(!empty($res->content)){
            Storage::delete($res->content);
            $res2 = DB::table('article')->where('id',$article_id)->delete();
            if($res2){
                    echo json_encode(array('delete_state'=>true));
            }else{
                    echo json_encode(array('delete_state'=>false));

            }
        }
    }
     public function article_public(Request $request){
        $input = $request->all();
        $article_id = $input['article_id'];
        $public = $input['p'];
        $res = DB::table('article_detail')->where('article_id',$article_id)->first();
        if(empty($res)){
            $res2 = DB::table('article_detail')->insert([
            'article_id'=>$article_id,
            'public'=>$public
            ]);
        }else{
            if($public !=$res->public){
                 $res2 = DB::table('article_detail')->where('article_id',$article_id)->update(
                     ['public'=>$public]
                    );
            }else{
                $res2='not change';
            }
        }
        echo $res2;
    }
    
}
