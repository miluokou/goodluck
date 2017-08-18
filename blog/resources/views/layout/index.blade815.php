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
	<link rel="stylesheet" href="home/tanchu/css/login.css" />
	<link rel="stylesheet" href="home/login/css/main.css" />

	<!-- <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css"> -->
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
		}
		/*去掉轮播图两侧阴影*/
		.carousel-control.left {
		  /*background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.0001) 100%);
		  background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.0001) 100%);
		  background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.0001) 100%);*/
		  background-image:none;
		  background-repeat: repeat-x;
		  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
		}
		.carousel-control.right {
		  left: auto;
		  right: 0;
		  /*background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.0001) 0%, rgba(0, 0, 0, 0.5) 100%);
		  background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0.0001) 0%, rgba(0, 0, 0, 0.5) 100%);
		  background-image: linear-gradient(to right, rgba(0, 0, 0, 0.0001) 0%, rgba(0, 0, 0, 0.5) 100%);*/
		  background-image:none;
		  background-repeat: repeat-x;
		  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
		}
		/*去掉轮播图两侧阴影*/
		#user{
			vertical-align:middle;
			width:32%;
			padding-bottom:2.5%;
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
		.bs-example{
			margin: 1% 0;
		}
		.carousel-inner{
			margin:1% 0;
		}
		#main_body{
			padding-bottom: 5%;
		}
		.user_gap{
			margin:3% 0;
		}
		.img-circle{
			margin: 3% 0;
		}
	</style>
	
</head>
<body>	
		<div class="container" id="top_right">
			<div class="pull-right">
				<span>
				<a id="my-home-exp" href="#" target="_blank" log="type:100,pos:userbar">我的文章</a>
				</span>&nbsp;|&nbsp;
				<span>
				<a id="my-income" href="#" target="_blank">我的米粒</a>
				</span>&nbsp;|&nbsp;
				<span>
				<a title="QQ:601071653" href="#" target="_blank">私信<span id="mnum"></span></a>
				</span>&nbsp;|&nbsp;
				<span>
					<a href="/index" target="_blank">米洛口首页</a>&nbsp;
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
							<li><a href="#about" class="scroll"><span data-hover="About">善良者保护协会</span></a></li>
							<li><a href="#portfolio" class="scroll"><span data-hover="Portfolio">完善建议</span></a></li>
							<li><a href="#services" class="scroll"><span data-hover="Services">Services</span></a></li>
							<li><a href="#mail" class="scroll"><span data-hover="Mail">Mail</span></a></li>
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
			<!-- 轮播图开始 -->
			<div id="carousel-example-generic" class="carousel slide col-md-8" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="home/img/featured-1.jpg" alt="...">
			      <div class="carousel-caption">
			        标题1
			      </div>
			    </div>
			    <div class="item">
			      <img src="home/img/featured-2.jpg" alt="...">
			      <div class="carousel-caption">
			        标题2
			      </div>
			    </div>
			    <div class="item">
			      <img src="home/img/featured-2.jpg" alt="...">
			      <div class="carousel-caption">
			        标题3
			      </div>
			    </div>
			  </div>
			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">上一张</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">下一张</span>
			  </a>
			</div>
			<!-- 轮播图结束 -->
			<!-- 头像开始 -->
			 <div class="container bs-example col-md-4 pull-right" id="user">
			 	<div class="container col-md-12">
			 			<center>
				 			<div> 	
					 		<img src="home/img/portfolio_pic8.jpg" alt="..." class="img-circle">
					 		</div>
					 		<div class="user_gap">
					 			<a href="index">用户名</a>
					 		</div>
							<div id="send" class="user_gap">
									<a href="home/edictor"><button type="button" class="btn btn-info user_gap">发布文章</button></a><br>
								 	<button type="button" class="btn user_gap">本站目前一共有10000位用户</button>
								 	<button type="button" class="btn user_gap">您的排名为1</button>		 		
							</div>
						</center>
				</div>
			 </div>
			<!-- 头像结束 -->
				<div class="bs-example col-md-8" data-example-id="simple-table">
				    <table class="table table-striped">
				      <caption>本周最佳</caption>
				      <thead>
				        <tr>
				          <th>排名</th>
				          <th>作者</th>
				          <th>作品名</th>
				          <th>评分</th>
				        </tr>
				      </thead>
				      <tbody>
				        <tr>
				          <th scope="row">1</th>
				          <td>Mark</td>
				          <td>Otto</td>
				          <td>@mdo</td>
				        </tr>
				        <tr>
				          <th scope="row">2</th>
				          <td>Jacob</td>
				          <td>Thornton</td>
				          <td>@fat</td>
				        </tr>
				        <tr>
				          <th scope="row">3</th>
				          <td>Larry</td>
				          <td>the Bird</td>
				          <td>@twitter</td>
				        </tr>
				      </tbody>
				    </table>
				 </div>
			
				<div class="bs-example col-md-8" data-example-id="simple-responsive-table">
				    <div class="table-responsive">
				      <table class="table table-striped">
				      	<caption>本月最佳</caption>
				        <thead>
				          <tr>
				            <th>排名</th>
				            <th>作者</th>
				            <th>作品名</th>
				            <th>Table heading</th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr>
				            <th scope="row">1</th>
				            <td>Table cell</td>
				            <td>Table cell</td>
				            <td>Table cell</td>
				          </tr>
				          <tr>
				            <th scope="row">2</th>
				            <td>Table cell</td>
				            <td>Table cell</td>
				            <td>Table cell</td>
				          </tr>
				          <tr>
				            <th scope="row">3</th>
				            <td>Table cell</td>
				            <td>Table cell</td>
				            <td>Table cell</td>
				          </tr>
				        </tbody>
				      </table>
				    </div><!-- /.table-responsive -->
		  		</div>
	  	</div>
	  	@show
	  	<footer id="wgt-footer" class="container wgt-footer">
		  	<center>
	&copy;2017米洛口&nbsp;&nbsp;<a href="http://www.baidu.com/duty/" target="_blank" rel="nofollow">使用米洛口前必读</a>&nbsp;&nbsp;<a href="http://www.baidu.com/search/jingyan_help.html#%E7%BB%8F%E9%AA%8C%E5%8D%8F%E8%AE%AE" target="_blank" rel="nofollow">米洛口文章协议</a>&nbsp;&nbsp;<a href="http://www.baidu.com/search/jingyan_editor.html" target="_blank" rel="nofollow">作者创作作品协议</a>&nbsp;&nbsp;    京ICP证030173号-1 京网文【2013】0934-983号
			</center>
		</footer>

</body>
</html>