<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManager;

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
use Cache;
use Image;
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
        $input = $request->all();
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
        
//      $token = $input['token'];
        
        $id = DB::table('article')->insertGetId($arr);
        $toke_id_hash = Hash::make($id.$token);
//      $toke_id_hash=urlencode($toke_id_hash);
         $file_name = date("Ymd");
         $time = date("Y-m-d H:i:s",time());
         $res =DB::table('article')
        ->where('id', $id)
        ->update(['content' => $file_name.'/'.$id.'.txt','time'=>$time,'token'=>$toke_id_hash]);
        if($res){
            $res2 = Storage::disk('local')->put($file_name.'/'.$id.'.txt', $content);
            if( $res2){
            	$toke_id_hash=str_replace('/',"斜杠",$toke_id_hash);
            		$toke_id_hash = urlencode($toke_id_hash);
             echo json_encode(array('state'=>true,'info'=>'发布成功','id'=>$toke_id_hash));      
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
        $token =$id.$input['token'];
        if(!empty($input['content']) && Hash::check($token,$res[0]->token)){
            $res2 = Storage::delete($res[0]->content);
            if($res2){
                $res3 = Storage::disk('local')->put($res[0]->content,$input['content']);
                $time = date("Y-m-d H:i:s",time());
                 $res4 =DB::table('article')
                ->where('id', $id)
                ->update(['time'=>$time]);
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
			$articles2=array();
             $cates2=array();
            $cates = DB::table('cate')->get();
             foreach ($cates as $ckey => $cvalue) {
                $cates2[$cvalue->id]=$cvalue->name;
            }
            $articles= DB::table('article')
	            ->leftJoin('article_detail', 'article.id', '=', 'article_detail.article_id')
	            ->select('article.*', 'article_detail.public')
	            ->get();
			if(empty($input['token'])){
				
	             foreach ($articles as $key => $value) {
	                if(!empty($value->content)){
	                    if($value->public!=1){
	                        $articles2[$cates2[$value->pid]][$value->id]['public']=$value->public;
	                  		$articles2[$cates2[$value->pid]][$value->id]['title']=$value->title;
	                  		 $encode_url=str_replace('/','斜杠',$value->token);
	                  		$articles2[$cates2[$value->pid]][$value->id]['token']=urlencode($encode_url);
	                    }
	                }
	            }
		     }else{
		     	
	            foreach ($articles as $key => $value) {
	                if(!empty($value->content) && Hash::check($value->id.$input['token'], $value->token)){
	                    if(!empty($value->public)){
	                        $articles2[$cates2[$value->pid]][$value->id]['public']=$value->public;
	                    }
	                   $articles2[$cates2[$value->pid]][$value->id]['title']=$value->title;
	                   $encode_url=str_replace('/','斜杠',$value->token);
	                   $articles2[$cates2[$value->pid]][$value->id]['token']=urlencode($encode_url);
	                }
	             }
		     }
//		     var_dump($articles2);
          if(empty($articles2)){
          	 foreach ($articles as $key => $value) {
	                if(!empty($value->content)){
	                    if($value->public!=1){
	                        $articles2[$cates2[$value->pid]][$value->id]['public']=$value->public;
	                  		$articles2[$cates2[$value->pid]][$value->id]['title']=$value->title;
	                  		 $encode_url=str_replace('/','斜杠',$value->token);
	                  		$articles2[$cates2[$value->pid]][$value->id]['token']=urlencode($encode_url);
	                    }
	                }
	            }
          }
        echo json_encode(array('articles2_new'=>$articles2,'cates'=>$cates2));      
    }
    public function show($id){
// 		 	$img = Image::canvas(800, 600, '#ff0000');  
//      echo $img->response('jpg', 70);
        
        // 这个是好用的
//      $img = Image::canvas(800, 600, '#ff0000');  
//      header('Content-Type: image/png');  
//      echo $img->encode('png');
//		第二种方法
//		$img = Image::canvas(800, 600, '#ff0000');  
//      return $img->response();

//  		 $manager = new ImageManager(array('driver' => 'imagick')); 
//  		 var_dump($manager); 
//     	 $manager->make('/foo.jpg');
			
			// 修改指定图片的大小  
//			$img = Image::make('/home/img/about1.jpg')->resize(200, 200);
//			var_dump($img);
//			  
//			// 插入水印, 水印位置在原图片的右下角, 距离下边距 10 像素, 距离右边距 15 像素  
//			$img->insert('/home/img/portfolio_pic8.jpg', 'bottom-right', 15, 10);  
//			  
//			// 将处理后的图片重新保存到其他路径  
//			$img->save('/home/img/jiashuiyin.jpg');  
//			  
//			/* 上面的逻辑可以通过链式表达式搞定 */  
////			$img = Image::make('images/avatar.jpg')->resize(200, 200)->insert('images/new_avatar.jpg', 'bottom-right', 15, 10); 
////			die;
            $articles = DB::table('article')->get();
//          $Edit= new Edit(); 

//以下是更新数据库中的token字段内容的代码，不要删，以后能用到，用来维护用的
//          foreach($articles as $k2=>$v2){
//          		if(!empty($v2->uid)){
//          			$res3 = DB::table('user')->where('id',$v2->uid)->get();
//          			$token =$res3[0]->token;
//          		}
//          		
//          		$id_token=Hash::make($v2->id.$token);
//         	 	$newcate=DB::table('article')
//              ->where('id', $v2->id)
//              ->update(['token'=>$id_token]);
//         	 	if($newcate){
//         	 		var_dump('第'.$v2->id.'条,标题为'.$v2->title.'的数据更新成功');
//         	 	}
            		
//          		if(empty($v2->content)){
//          			$res = DB::table('article')->where('id',$v2->id)->delete();
//          			if($res){
//          				var_dump('删除了内容为空的 第'.$v2->id.'条,标题为'.$v2->title.'的数据');
//          			}
//          		}
//          		if(empty($v2->uid)){
//          			$res = DB::table('article')->where('id',$v2->id)->delete();
//          			if($res){
//          				var_dump('删除了内容为空的 第'.$v2->id.'条,标题为'.$v2->title.'的数据');
//          			}
//          			$res2 = Storage::delete($v2->content);
//          			if($res2){
//          				var_dump('删除了内容为空的 第'.$v2->id.'条,标题为'.$v2->content.'的内容');
//          			}
//          		}
//          }
//批量修改token字段的内容结束
            	
//          $newcate = $Edit->update_tables('article','token',$id,$id_token);
//          foreach($articles as $v){
//          		$yanzheng = $v->id.$v->token;
//            	if (Hash::check($yanzheng, $id)) {
//	            		var_dump('wwww');
//	            		$id = $v->id;
//				}
//          }

            $articles_detial = DB::table('article_detail')->get();
             if(strpos($id,'.html')){
                $id = str_replace('.html','',$id);
            }
            $id = urldecode($id);
            $id = str_replace('斜杠','/',$id);
            foreach ($articles as $key => $value) {
                foreach ($articles_detial as $key2 => $value2) {
                    if(!empty($value2->public)){
                        if($value->id==$value2->article_id){
                             $value->public = $value2->public;
                        }
                     }
                }
            }
            
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
                    return view('home.article',['articles2'=>$articles2,'contents'=>$contents,'article_title'=>'',"article_id"=>$id,'view'=>$view,'public_s'=>"",'arti_id'=>0]);
                }else{
                    $articles = DB::table('article')->where('token',$id)->first();
//                   var_dump($articles);
//          			die;
                    if(!empty($articles->content)){
                         $contents = Storage::get($articles->content);
                         $view= $articles->view;
                         $iid= $articles->id;
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
                        $iid=0;
                    }
                return view('home.article',['articles2'=>$articles2,'contents'=>$contents,'article_title'=>$articles->title,'article_id'=>$id,'view'=>$view,'public_s'=>$public_s,'arti_id'=>$iid]);
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
		        if(!empty($res)){
		            echo 'zhixingle';
		        }
        }
        echo 'meizhixing';
    }
    public function get_token(Request $request){
        $input = $request->all();
        $token =Hash::make($input['article_id'].$input['token']);
        $token = urlencode($token);
        echo json_encode(array('data'=>$token));      
    }
}
