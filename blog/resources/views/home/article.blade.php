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
    <script type="text/javascript" charset="utf-8" src="/js/article.js"></script>
@endsection
@section('main_body')
<div class="container" id="article">
  {!! csrf_field() !!}
	<div class="col-md-3 col-sm-3 col-xs-3">
		<div class="col-md-11 col-sm-11 col-xs-11" id="course">
		</div>
	</div>
	<div class="col-md-9 col-sm-9 col-xs-9" id="content">
		<h3 id="title_edit">
	      <span id ='article_title_text'>{{$article_title}}</span>
	      <a href="javascript:void(0)" title-id="{{$article_id}}" id="edit_titles">&nbsp;编辑</a>
	   </h3>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div id="edit_contents_div">
          <a href="javascript:void(0)" title-id="{{$arti_id}}" id="edit_contents">编辑</a>
          <span>&nbsp;|&nbsp;</span>
          <a href="javascript:void(0)" title-id="{{$arti_id}}" id="edit_delete">删除</a>
          <span>&nbsp;|&nbsp;</span>
          <a href="javascript:void(0)" title-id="{{$arti_id}}" id="private_public">
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
 
@endsection