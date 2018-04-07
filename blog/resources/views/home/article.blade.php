@extends('layout.index')
@section('title', '内容页')
@section('css')
	<style type="text/css">
	#content{
		padding:1% 0;
	}
	.list-group li{
		/*list-style-type:none;*/
		border-bottom:1px dashed rgba(0,0,0,.1);
		padding: 2%;
	}
  #title_edit a{
    font-size: 18px;
  }
	</style>
  <link rel="stylesheet" href="/home/edictors/component.css">
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
@endsection
@section('main_body')
<div class="container" id="article">
	<div class="col-md-3 col-sm-3 col-xs-3">
		<div class="col-md-11 col-sm-11 col-xs-11" id="course">
        <h4>
            文章列表
        </h4>
        <ul class="list-group" id="article_list">
        	@foreach ($articles2 as $key=> $articles)
          <!-- var_dump($articles2); -->
              <span>{{$key}}</span>
              @foreach($articles as $arti)
                  @if(!empty($arti->public))
                    <li data-id="{{$arti->id}}" style="background:#f5f5f5;">
                      <a href="/home/article/{{$arti->id}}.html" title="">
                          {{$arti->title}}
                      </a>
                    </li>
                  @else
                  <li data-id="{{$arti->id}}">
                      <a href="/home/article/{{$arti->id}}.html" title="">
                          {{$arti->title}}
                      </a>
                  </li>
                  @endif
              @endforeach
            @endforeach
        </ul>
		</div>
	</div>
	<div class="col-md-9 col-sm-9 col-xs-9" id="content">
		<h3 id="title_edit">
      <span id ='article_title_text'>{{$article_title}}</span>
      <a href="javascript:void(0)" title-id="{{$article_id}}" id="edit_titles">&nbsp;编辑</a>
    </h3>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div id="edit_contents_div">
          <a href="javascript:void(0)" title-id="{{$article_id}}" id="edit_contents">编辑</a>
          <span>&nbsp;|&nbsp;</span>
          <a href="javascript:void(0)" title-id="{{$article_id}}" id="edit_delete">删除</a>
          <span>&nbsp;|&nbsp;</span>
          <a href="javascript:void(0)" title-id="{{$article_id}}" id="private_public">
            @if($public_s ==1)
            私人
            @else
            公开
            @endif
          </a>
          <!-- public_s -->
        </div>
      <div id="contents" >
		      {!! $contents !!}
      </div>
      <div id="ue_editor">
          <!-- 加载编辑器的容器 -->
          <script id="container" name="content" type="text/plain">
              这里写你的初始化内容
          </script>
          <!-- 配置文件 -->
          <!-- 实例化编辑器 -->
          <script type="text/javascript">
              var ue = UE.getEditor('container');
          </script>
          <button id="update_submit" class='btn btn-default'>提交</button>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3 pull-left" style="font-size:14px;color:rgb(177,183,199);">
      <span>阅读 {{$view}}</span>
      &nbsp;
      <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="padding-top:2%;"></span>&nbsp;<span>1</span>
      <!-- <label>3</label> -->
      <!-- <a href="#top" class="back-to-top"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a> -->
    </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        确定要删除吗？
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消删除</button>
        <button type="button" class="btn btn-primary" id="sure_delete" data-dismiss="modal">确认删除</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var ue = UE.getEditor('container');
  $(document).on('click','#title_edit a',function(){
      var title_id = $('#title_edit a').attr('title-id');
      var title = $('#article_title_text').html();
      $('#title_edit').html('<input type="text" name="title_edit_input" value="'+title+'">{!! csrf_field() !!}');
      $('input[name="title_edit_input"]').css("width",'80%');
  })
  .ready(function(){
        var article_id = $("#title_edit a").attr('title-id');
        $('[data-id="'+article_id+'"]').attr("class","active");
        $('[data-id="'+article_id+'"]').css("font-weight","bold");
        $('[data-id="'+article_id+'"] a').css("color","#f4645f");
       var name=  $("#article_list li a").attr('href');
       var window_url = window.location.pathname;
       var reg = new RegExp("/home/article/|.html","g");
        if(window_url=='/home/article/0.html' || window_url=="/home/article/0"){
          location.href=name;
        }
       $('#my-home-exp').attr('href',name);
       $('#container').hide();
       $("#update_submit").hide();
           var param = {};
           param['token']= window.localStorage.token;
           param['article_id']= article_id;
          
           var url1 = '/token_yanzheng';
           var url2 = '/home/center';

           var data = ajax_post(url1,param);
           var data2 = ajax_get(url2);

           if(data){
              if(data.show_edit){
                $('#edit_contents_div').remove();
                $('#edit_titles').remove();
              }
            }else{
              alert('请求失败')
            }
           if(data2){
              var html3 = '<li class="active"><a href="/index">首页</a></li>';
              for(var i=0;i<data2.children.length;i++){
                  html3+='<li><a href="#about" class="scroll"><span data-hover="About">'+data2.children[i].name+'</span></a></li>';
              }
              $(".nav.navbar-nav").html(html3);
           }
     
      if(!window.localStorage.status || !window.localStorage.token){
        $("#edit_contents_div").remove();
        $("#edit_titles").remove();
        
      }
    })
  .on('click','#private_public',function(){
    var ppcontent = $("#private_public").html();
    if(Trim(ppcontent)=="公开"){
      $("#private_public").html("私人");
      var p = 1;
    }
    if(Trim(ppcontent)=="私人"){
      $("#private_public").html("公开");
      var p = 0;
    }
    var article_id = $('#edit_contents').attr('title-id');
    var param={};
    param['article_id']=article_id;
    param['p']=p;
    var url3 = '/article/public';
    var data3 = ajax_post(url1,param);
    if(data3){
      location.reload();
    }
  })
  .on('click','#edit_contents',function(){
    if($("#edit_contents").html()=="取消"){
      $('#contents').show();
      $('#container').hide();
      $("#edit_contents").html("编辑");
      $("#update_submit").hide();
    }else{
      var content = $('#contents').html();
      ue.ready(function(){
            //编辑器初始化完成再赋值  
            ue.setContent(content);  
            //赋值给UEditor  
      });
      $('#contents').hide();
      $('#container').show();
      $("#edit_contents").html("取消");
      $("#update_submit").show();
      var article_content = UE.getEditor('container').getContent();
      window.localStorage.origion_content=article_content;
    }
  })
  .on('click','#edit_delete',function(){
      $("#myModal").modal('show');
      $("#sure_delete").click(function(){
        var article_id = $('#edit_contents').attr('title-id');
        var param={};
        param['article_id']=article_id;
        var data4 = ajax_post('/article/delete',param);
        if(data4.delete_state){
            location.href=window.location.protocol+'//'+window.location.host+'/home/article/0'; 
        }
      });
  })
  .on("click",'#update_submit',function(){
    var origion_content = window.localStorage.origion_content;
    var param = {};
    var article_id = $('#edit_contents').attr('title-id');
    var article_content = UE.getEditor('container').getContent();
    param['article_id']=article_id;
    param['content']=article_content;
    param['token']=window.localStorage.token;
    if(origion_content!=article_content){
      var data5 = ajax_post('/edictor/update',param);
    }
    location.reload();
  })
  .on('blur','input[name="title_edit_input"]',function(){
    var param = {};
     param['token']= window.localStorage.token;
     param['username']= window.localStorage.username;
     param['update_title']= $('input[name="title_edit_input"]').val();
     param['id']= $("#edit_contents").attr('title-id');
    var data = ajax_post('/edit_t',param);
    if(data.state){
        location.reload();
    }
  });
  $(document).ready(function(){
      var param = {};
       var article_id = $('#edit_contents').attr('title-id');
       param['token']= window.localStorage.token;
       param['article_id']= article_id;
      var window_url = window.location.pathname;
      var reg = new RegExp("/home/article/|.html","g");
      if(window_url=='/home/article/0.html' || window_url=="/home/article/0"){
        
      }else{
           var data = ajax_post('/edictor/view_count',param);
      }
       var data = ajax_post('/edictor/show_list',param);
       var content = foreach_first(data.articles2_new);
       var content2={};
       var html =' <h4>文章列表</h4><ul class="list-group" id="article_list">';
       html += '<ul>';
       for(var i=0;i<content.i;i++){
         html+='<span>'+content.k[i]+'</span>';
         content2 = foreach_first(content.v[i]);
         console.log(content2);
         for(var j=0;j<content2.i;j++){
            if(content2.v[j].public == 1){
              html+='<li data-id="'+content2.k[j]+'" style="background:#f5f5f5;">';
              html+='<a href="/home/article/'+content2.k[j]+'.html" title="">'+content2.v[j].title+'</a></li>';
            }else{
              html+='<li data-id="'+content2.k[j]+'">';
              html+='<a href="/home/article/'+content2.k[j]+'.html" title="">'+content2.v[j].title+'</a></li>';
            }
            
         }
       }
       html += '</ul>';

         console.log(html);
      // $('#course').html(html);
        console.log(content);

       // console.log(data.articles2_new.keys());
        // 
        //   @foreach ($articles2 as $key=> $articles)
        //   <!-- var_dump($articles2); -->
        //       <span>{{$key}}</span>
        //       @foreach($articles as $arti)
        //           @if(!empty($arti->public))
                    // <li data-id="{{$arti->id}}" style="background:#f5f5f5;">
                    //   <a href="/home/article/{{$arti->id}}.html" title="">
                    //       {{$arti->title}}
                    //   </a>
                    // </li>
        //           @else
        //           <li data-id="{{$arti->id}}">
        //               <a href="/home/article/{{$arti->id}}.html" title="">
        //                   {{$arti->title}}
        //               </a>
        //           </li>
        //           @endif
        //       @endforeach
        //     @endforeach
        // </ul>

       
  })
</script> 
@endsection