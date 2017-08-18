<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<!-- 登录部分的css -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!--确保适当的绘制和触屏缩放-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./home/tanchu/css/login.css" />
	<link rel="stylesheet" href="./home/login/css/main.css" />

	<!-- <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css"> -->
	
	@section('css')
	@show
	<style type="text/css">
		*{
			font-family: arial,tahoma,'Microsoft

			 Yahei','宋体',sans-serif;
		}
		body{
			background-color:#f5f5f5;
		}

		#navigation{
			/*margin:10px;*/
			/*padding-left:20px;*/
			position:fixed;
			/*background:#65666d;*/
			background:white;
			width:100%;
			padding-top:15px;
			margin-top:-60px;
			height:60px;
			z-index:2; 
			/*透明样式*/
			opacity:0.95;
			line-height: 100%;
			
			/*透明样式*/
		}
		#navigation >ul{
			margin-left: 150px;

		}

		/*#navigation ul li{
			padding-left:10px;
		}*/
		#content{
			height: 500px;
			margin:50px auto;
			/*border: 1px solid lightblue;*/
			background-color:white; 
		}
		#content div{
			/*margin: 20px;*/
			padding:20px;
			border:1px solid red;

		}
		#publish{
			margin-top:5px;
			height: 395px;
			background:white;

		}
		#twocolumns{
			margin-top:60px;
			/*margin-left:100px;*/
			/*border:1px solid red;*/

		}
		#carousel-example-generic .carousel-inner .item{
			height:400px;
			/*position:absolute;*/
		}
		#carousel-example-generic{
			margin-left:-23px; 
			/*border:1px solid red;*/
		}
		/*登录的样式*/
		.loginDiv { width: 400px; height: 450px; }
		#loginDiv { width: 400px; height: 450px; z-index: 99999; }

		.theme-buy div{
			display: block;
		}
	</style>
	
	<script>
	jQuery(document).ready(function($) {
		$('.theme-login').click(function(){
			$('.theme-popover-mask').fadeIn(100);
			$('.theme-popover').slideDown(200);
		})
		$('.theme-poptit .close').click(function(){
			$('.theme-popover-mask').fadeOut(100);
			$('.theme-popover').slideUp(200);
		})

	})
	</script>
	

</head>
<body>
	@section('navigation')
	<!--导航开始-->
	<figure>
	<div class="navbar" id="navigation">
		<ul class="nav nav-pills" role="tablist">
		  <li role="presentation" class="active"><a href="#">首页</a></li>
		  <li role="presentation"><a href="#">书评</a></li>
		  <li role="presentation"><a href="#">栏目二</a></li>
		  <li role="presentation" class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		      栏目三下拉<span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu" role="menu">
			    <li><a href="#">三级分类的一个</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">二级分类应该是</a></li>
	            <li class="divider"></li>
	            <li><a href="#">站长文献</a></li>
	            <li><a href="#">以前的电子杂志</a></li>
		    </ul>
		  </li>
		  <li role="presentation">
		  <!--登陆啊-->
				<div class="theme-buy">
				<a class="theme-login" href="javascript:;">登录</a>
				<a href="/home/register">注册</a>

				</div>	
		  <!--登陆啊-->	
		  </li>
		  <!-- 登录结束 -->
		</ul>

	</div>
	<!--导航结束-->
	@show
	@section('login')
	<!--登录开始-->
	<div class="theme-popover">
	     <div class="theme-poptit">
	          <a href="javascript:;" title="关闭" class="close">×</a>
	          <h3>登录 </h3>
	     </div>
	     <div class="theme-popbod dform">
	           <form class="theme-signin" name="loginform" action="" method="post">
	                <ol>
	                     <li><h4>你必须先登录！</h4></li>
	                     <li><strong>用户名：</strong><input class="ipt" type="text" name="username" value="lanrenzhijia" size="20" /></li>
	                     <li><strong>密码：</strong><input class="ipt" type="password" name="password" value="***" size="20" /></li>
	                     <li><input class="btn btn-primary" type="submit" name="submit" value=" 登 录 " /></li>
	                </ol>
	           </form>
	     </div>
	</div>
	<div class="theme-popover-mask"></div>
	<!--登录结束-->
	@show
	@section('twocolumns')
	<!--轮播开始-->	
	<div class="container" id="twocolumns">
		<div class = "col-md-9">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		          <!-- Indicators -->
		          <ol class="carousel-indicators">
		            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		          </ol>
		        
		          <!-- Wrapper for slides -->
		          <div class="carousel-inner">
		            <div class="item active" style="background-size:cover;">
		              <img src="./home/img/featured-1.jpg" alt="...">
		              <div class="carousel-caption">
		                <h4>第一张</h4>
		              </div>
		            </div>
		            <div class="item" style="background-size:cover;">
		              <img src="./home/img/featured-2.jpg" alt="...">
		              <div class="carousel-caption">
		                <h4>第二张</h4>
		              </div>
		            </div>
		            <div class="item" style=" background-size:cover;">
		              <img src="./home/img/about.jpg" alt="..." >
		              <div class="carousel-caption">
		                <h4>第三张</h4>
		              </div>
		            </div>
		        
		          </div>
		        
		          <!-- Controls -->
		          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		            <span class="glyphicon glyphicon-chevron-left"></span>
		          </a>
		          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		            <span class="glyphicon glyphicon-chevron-right"></span>
		          </a>
		    	</div>
		    </div>
		   <!--轮播结束-->
		   	<div class="col-md-3" id="publish">
		   	<p>多少多少个用户</p>
		   	<p>多少多少个文章</p>
		   	<!--  <input  type="submit" class="btn btn-info btn-lg btn-block" href="/home/edictor" value="发布"></input> -->
		   	<a href="/home/edictor" style='text-decoration:none;'><input  type="button" class="btn btn-info btn-lg btn-block" value="发表文章"></input></a>
		   	</div>
	</div>
	
	@show
	@section('content')
        <div class="row container" id="content">
		  <div class="col-md-10">
			<ul class="list-unstyled">
				<h4>本周更新</h4>
				<li><a href="">这是一个标题 col-md-9</a></li>
				<li><a href="">这是一个标题 col-md-9</a></li>
				<li><a href="">这是一个标题 col-md-9</a></li>
				<li><a href="">这是一个标题 col-md-9</a></li>
			</ul>
		  </div>
		  <div class="col-md-2">.col-md-2</div>
		</div>
	@show
	</figure>
</body>
</html>
