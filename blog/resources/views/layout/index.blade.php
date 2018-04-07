<!doctype html>
<html lang="zh-CN">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?71d53aa86f2f001596bf579b662a927e";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<head>
	<meta charset="UTF-8">
	<!-- 登录部分的css -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="_token" content="{{ csrf_token() }}"/>
	<!--确保适当的绘制和触屏缩放-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>
	<script type="text/javascript" src="/js/jquery.min.js"></script>

	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<!-- <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" />
	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<!-- <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<!--<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<!-- <link rel="stylesheet" href="/bootstrap/js/bootstrap.min.js" /> -->
	<!-- <link rel="stylesheet" href="home/tanchu/css/login.css" /> -->
	<link rel="stylesheet" href="/home/login/css/main.css" />
	<script type="text/javascript" src="/js/login.js"></script>
	<script type="text/javascript" src="/js/echarts.js"></script>
	<script type="text/javascript" src="/js/function.js"></script>

	@section('css')
	@show
	<style type="text/css">
		*{
			font-family: arial,tahoma,'MicrosoftYahei','arial',sans-serif;
		}
		body{
			background-color:#f5f5f5;
		}
		.container{
		    border-radius: 4px 4px 0 0;
		    background-color:#FFFFFF;
		    margin-top:0.1%;
		}
		.bs-example{
			border:1px solid #ddd;
		    border-radius: 4px 4px 0 0;
		    margin: 0.5% 0;
		}
		/*去掉轮播图两侧阴影*/
		.carousel-control.left {
		  background-image:none;
		  background-repeat: repeat-x;
		  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
		}
		.carousel-control.right {
		  left: auto;
		  right: 0;
		  background-image:none;
		  background-repeat: repeat-x;
		  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
		}
		/*去掉轮播图两侧阴影*/
		#user{
			vertical-align:middle;
			width:32%;
			padding-bottom:1%;
			height:auto;
		}
		#user img{
			width: 140px;
			height:140px;
		}
		#nav nav{
			font-size: 16px;
		}
		#top_right{
			background:#f5f5f5;
		}
		#carousel-indicators{
			width:100%;
		}
		#carousel-example-generic img{
			width: 100%;
		}
		.item img{
			width: 100%;
		}
		#wgt-footer{
			height: 100px;
			line-height: 100px;
		}
		.carousel-inner{
			margin:1% 0;
		}
		#main_body{
			padding-bottom: 5%;
		}
		.user_gap{
			margin:2% 0;
		}
		.img-thumbnail{
			margin: 3% 0;
		}
		#submit-btn{
			margin-left: -1.3%;
		}
		#submit-btns{
			margin-left:25%;
		}

		#submit-btns input{
			margin:1% 2%;
		}
		.modal{
			margin-top:7%;
		}
		#form-group_yanzhengma{
			width: 50%;
			float: left;
		}
		#newtest{
			    width: 30%;
    			margin-left: 1.5%
		}
		#tishixin{
			position: absolute;
		    z-index: 9999;
		    width: 15%;
		    margin-left: 49%;
		    margin-top: 3%;
		}
		#tishixin p{
			color:black;
			font-size: 12px;
		}
	</style>

</head>
<body>	
	<script type="text/javascript">
	 	var mess = $("#tishixin p").html();

	 	// console.log(mess);
	 // if(typeof(mess)!="undefined"){
			 // setTimeout("countSecond()", 1000);
			 // setTimeout("countSecond2()", 3000);
			 function countSecond(){
			 // 	var mess = $("#tishixin p").html();
			 // 	alert(mess);
			 	$("#tishixin").click();
			 	// $('#tishixin').attr('class',"alert alert-info fade in");
			 }
			 function countSecond2(){
			 	$("#tishixin").click();
			 	// $('#tishixin').attr('class',"alert alert-info fade in");
			 }
		// }
	</script>
		<!-- <div class="alert alert-info fade in" id="tishixin" data-dismiss="alert"> -->
			<!-- <p>{{ Session::get('info')}}</p>	     -->
		<!-- </div> -->
		<div class="modal fade" id="Modal-warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
					</button>
				<h4 class="modal-title" id="myModalLabel">
					Warning
				</h4>
			</div>
			<div class="modal-body">
				This class has started, please try to book another class
			</div>
				</div>
			</div>
		</div>
			@section('tishixinxi')
			@show
		<div class="container" id="top_right">

			<div class="pull-right">
				<span>
					<a href="/index">米洛口首页</a>&nbsp;|
				</span>
				<span>
					<a href="/edictor">发布文章</a>&nbsp;|
				</span>
				<span>
				<a id="my-home-exp" href="/home/article/0" target="_blank" log="type:100,pos:userbar">作品页</a>
				</span>&nbsp;|&nbsp;
				<span>
				<a id="my-income" href="/center" target="_blank">我的米洛口</a>
				</span>&nbsp;|&nbsp;
				<!-- <span>
				<a title="QQ:348393887" href="#" target="_blank">情书<span id="mnum"></span></a>
				</span>&nbsp;|&nbsp; -->
				
				<span>
					<!-- <button type="button" data-toggle="modal" data-target="#myModal">
					  Launch demo modal
					</button> -->
					<a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" id='login'>
			  			登录
					</a>&nbsp;|
					<a href="#" data-toggle="modal" data-target="#exampleModals"  data-whatever="@fat" id='register'>
			  			注册
					</a>&nbsp;
					<!-- 网站登录弹出框 用的bootstrap的模态框 -->
					<!-- 登陆的页面开始 -->
					<!-- <form action='/login' method='post'> -->
						{!! csrf_field() !!}
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        <span aria-hidden="true">&times;</span>
						        </button>
						        <h4 class="modal-title" id="exampleModalLabel">登录</h4>
						      </div>
						      <div class="modal-body">
						          <div class="form-group has-success">
						            <label for="login_name" class="control-label">笔名:</label>
						            <input type="text" class="form-control" id="login_name" name='login_name' value="{{ old('name') }}">
						            <span id="login_helpBlock1" class="help-block">{{$errors->first('login_name')}}</span>
						          </div>
						          <div class="form-group has-warning">
						            <label for="login_pass" class="control-label">密码:</label>
						            <input type="password" class="form-control" id="login_pass" name='login_pass'>
						           	<span id="login_helpBlock2" class="help-block">{{$errors->first('login_pass')}}</span>
						          </div>
						          <div class="form-group">
							          	<div id='form-group_yanzhengma'>
							            	<label for="vcode_id" class="control-label" name='code'>验证码:</label>
							            	<input type="text" class="form-control" id="vcode_id" name='vcode' data-toggle="popover" data-trigger="focus" data-placement="bottom"  data-content="邮件已经发送,请把验证码填写到下面">
							            	<!-- <span id="helpBlock1" class="help-block">{{$errors->first('vcode')}}</span> -->
							        	</div>
							        	<br>
							        	<div>
							          		<a onclick="javascript:void(0);" style="..." title="刷新图片">
												<img src="{{URL('/home/vcode/1')}}" id="captcha" alt="验证码" title="刷新图片" style='margin-left:10px;cursor:pointer' onclick="this.src = this.src+1">
							          		</a>
							          	</div>
						          </div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						        <!-- <input type="submit" class="btn btn-primary" value="提交" > -->
						        <input type="button" class="btn btn-primary" data-dismiss="modal" value="提交" id="register_submit">
						        <!-- <input type="submit"  -->
						      </div>
						    </div>
						  </div>
						</div>
					<!-- </form> -->
					<!-- 登陆的页面结束 -->
					<!-- 注册的页面开始 -->
				<form action='/home/doRegister' method='post'>
					{!! csrf_field() !!}
					<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					        </button>
					        <h4 class="modal-title" id="exampleModalLabel">注册</h4>
					      </div>
					      <div class="modal-body">
					          <div class="form-group has-success">
					            <label for="register_name" class="control-label">笔名:</label>
					            <input type="text" class="form-control" id="register_name" name='name' value="{{ old('name') }}">

					            <span id="helpBlock1" class="help-block">{{$errors->first('name')}}</span>

					          </div>
					          <div class="form-group has-warning">
					            <label for="register_pass" class="control-label">密码:</label>
					            <input type="password" class="form-control" id="register_pass" name='pass'>
					           	<span id="helpBlock2" class="help-block">{{$errors->first('pass')}}</span>
					          </div>
					          <div class="form-group has-error">
					            <label for="register_rpass" class="control-label">确认密码:</label>
					            <input type="password" class="form-control" id="register_rpass" name='rpass' data-toggle="popover" data-trigger="focus" data-placement="bottom"  data-content="两次密码输入不一致">
					            <span id="helpBlock3" class="help-block">{{$errors->first('rpass')}}</span>
					          </div>
					          
					          <div class="form-group">
						          	<div id='form-group_yanzhengma'>
						            	<label for="vcode_id2" class="control-label" name='code'>验证码:</label>
						            	<input type="text" class="form-control" id="vcode_id2" name='vcode' data-toggle="popover" data-trigger="focus" data-placement="bottom"  data-content="邮件已经发送,请把验证码填写到下面">
						            	<!-- <span id="helpBlock1" class="help-block">{{$errors->first('vcode')}}</span> -->
						        	</div>
						        	<br>
						        	<div>
						          		<a onclick="javascript:void(0);" style="..." title="刷新图片">
											<img src="{{URL('/home/vcode/1')}}" id="captcha" alt="验证码" title="刷新图片" style='margin-left:10px;cursor:pointer' onclick="this.src = this.src+1">
						          		</a>
						          	</div>
					          </div>
					          
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					        <input type="submit" class="btn btn-primary" id='regiser_submit' value="提交" disabled="disabled">
					        <!-- <input type="submit"  -->
					      </div>
					    </div>
					  </div>
					</div>
				</form>
					<!-- 注册的页面结束 -->
					<!-- 网站登录弹出框 用的bootstrap的模态框 -->
				</span>
			</div>
		</div>
		
		@section('nav')
		<div class="container" id="nav">
			<nav>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2"> 
						<ul class="nav navbar-nav">
							<li class="active"><a href="/index">首页</a></li>
							<li><a href="#about" class="scroll"><span data-hover="About">分类</span></a></li>
							<li><a href="#portfolio" class="scroll"><span data-hover="Portfolio">关于我们</span></a></li>
							<li><a href="#services" class="scroll"><span data-hover="Services">联系我们</span></a></li>
							<li><a href="#mail" class="scroll"><span data-hover="Mail">网站开发中</span></a></li>
						</ul>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>
		@show
		@section('main_body')
		<!-- 排名 -->
		<div class="container" id="main_body">
			
			@section('touxiang')
			
			@show
				
	  	</div>
	  	@show
	  	<footer id="wgt-footer" class="container wgt-footer">
		  	<center>
	&copy;2018米洛口&nbsp;&nbsp;
	<!-- 		
	<a href="http://www.zhuguangqian.com/" target="_blank" rel="nofollow">使用米洛口前必读</a>
	&nbsp;&nbsp;<a href="http://www.zhuguangqian.com/search/jingyan_help.html#%E7%BB%8F%E9%AA%8C%E5%8D%8F%E8%AE%AE" target="_blank" rel="nofollow">米洛口文章协议</a>
	&nbsp;&nbsp;<a href="http://www.zhuguangqian.com/search/jingyan_editor.html" target="_blank" rel="nofollow">作者创作作品协议</a>
	&nbsp;&nbsp;    京ICP证XXXXX号-X 京网文【XXXX】XXXX-XXX号
			<a href="http://www.prccopyright.org.cn/default.aspx">中国文字著作协会</a> -->
			<a href="http://naotu.baidu.com/" target="view_window">百度脑图</a>&nbsp;
			<a href="http://www.gushiwen.org/" target="view_window">古诗文网</a>&nbsp;
			<a href="https://v3.bootcss.com/components/" target="view_window">bootstrap文档</a>
			</center>

		</footer>
	

</body>
</html>
