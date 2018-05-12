@extends('layout.index')
@section('title', '发布文章')
@section('css')
    <link rel="stylesheet" href="/home/edictors/component.css">
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <style type="text/css">
        .selection{
            margin-bottom: 1%;
        }
    </style>
    <script type="text/javascript" src="/js/center.js"></script>
@endsection
@section('nav')
@endsection

@section('main_body')
    <div class="container">
        <form action="edictor/edit" method="post">
            <!-- {{csrf_token()}} -->
            {{ csrf_field() }}
                <center>
                    <section class="content bgcolor-8">
                        <span class="input input--isao">
                            <h3>
                                <input class="input__field input__field--isao" type="text" id="title" onfocus="javascript:if(this.value=='文章标题')this.value='';" value="" name="title"/>
                                <label class="input__label input__label--isao" for="title" data-content="">
                                    <span class="input__label-content input__label-content--isao"></span>
                                </label>
                            </h3>
                        </span>
                    </section>
                </center>
                <div class="col-md-12 col-sm-12 col-xl-12">
                    <div class="col-md-3 col-sm-3 col-xl-3 selection">
                        <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father" id="cateselect">
                            <option value="0">---请选择父类---</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xl-3 selection">
                        <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father1" id="cateselect2">
                            <option value="0">---请选择父类---</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xl-3 selection">
                        <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father2" id="cateselect3">
                            <option value="0">---请选择父类---</option>
                        </select>
                    </div>
                </div>
                <!-- 引用标题 -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <script id="editor" type="text/plain" style="height:500px;width:100%;"></script>
                </div>
                <!-- </center> -->
       
	       <div class="container pull-left" id="submit-btn">
	            <div id="submit-btns">
	                <!-- <center> -->
	                    <input  type="button" class="btn btn-default col-md-2" value="预览"></input>
	                    <input  type="submit" class="btn btn-default col-md-2" value="保存草稿"></input>
	                    <input  type="button" class="btn btn-info col-md-2" value="发布" id="submit"></input>
	                <!-- </center> -->
	            </div>
	        </div>
        </form>
    </div>

<script type="text/javascript">

</script>
<script type="text/javascript" src="/js/editor.js"></script>
@endsection
