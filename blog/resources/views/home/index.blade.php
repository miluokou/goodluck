	@extends('layout.index')
	@section('title', '首页')
	@section('tishixinxi')
	<script type="text/javascript" src="/js/register.js"></script>
	<script type="text/javascript" src="/js/center.js"></script>
	<style> 
		@font-face
		{
		font-family: myFirstFont;
		src: url('/css/xjlzt.fon'),
		     url('/css/xjlzt.fon'); /* IE9+ */
		}
		
		#qiandao .modal-body center{
			font-family:myFirstFont !important;
		}
	</style>
	<script type="text/javascript">
//    function draw(){
//      var canvas = document.getElementById('tutorial');
//      if (canvas.getContext){
//        var ctx = canvas.getContext('2d');
//      }
$(document).ready(function(){
		var canvas=document.getElementById('myCanvas');
		var bb=canvas.getContext('2d');
//		ctx.fillStyle='#FF0000';
//		ctx.fillRect(0,0,80,100);
//       var ctx = document.getElementById('myCanvas').getContext('2d');
//		 ctx.font = "48px serif";
//		ctx.textBaseline = "hanging";
//		ctx.strokeText("Hello world", 0, 100);
		
		bb.fillStyle = '#99f';    //   填充颜色  
        bb.fillRect(0,0,1000,1000);  
  
//      var img = new Image;  
//      img.src = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1525547343312&di=02354016a31a3c86828b78cccb99a4f5&imgtype=0&src=http%3A%2F%2Fpic7.photophoto.cn%2F20080408%2F0034034431511765_b.jpg';  
//		
//      img.onload = function () {  
//          bb.drawImage(img, 0,0,canvas.width,canvas.height);  
//      }  
  
        bb.fillStyle = '#fff';   // 文字填充颜色  
        bb.font = '33px myFirstFont';  
        bb.fillText('怎么得到你想要的?',0,250);  
  
        bb.fillStyle = '#fff';  
        bb.font = '66px myFirstFont';  
        bb.fillText('让自己配得上!',0,200);  
  
        bb.stroke(); 
});
    </script>
    <style type="text/css">
      canvas { border: 1px solid black; }
    </style>
	<script type="text/javascript">
		$(document).ready(function(){
			var o = document.getElementById("carousel-example-generic");
			var h = o.offsetHeight;
			$('#user').css('height',h);
			window.onresize = function(){
				var o = document.getElementById("carousel-example-generic");
				var h = o.offsetHeight;
				$('#user').css('height',h);
			}
		})
	</script>
	<?php
//		$src = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1525547343312&di=02354016a31a3c86828b78cccb99a4f5&imgtype=0&src=http%3A%2F%2Fpic7.photophoto.cn%2F20080408%2F0034034431511765_b.jpg';
//		$info = getimagesize($src);
//		$type = image_type_to_extension($info[2],false);
////		$fun = "imagecreateform{$type}";
//		$fun = imagecreateform($type);
////		$image = $fun($src);
//		echo '<pre>';
//		var_dump($fun);
	?>
	<button type="button" id='mybutton' class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"  style='display:none;' value="{{ Session::get('info')}}">Small modal</button>
  <!-- 提示信息框 -->
	<div class="modal fade bs-example-modal-sm in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
	    <div id='register_return_message' class="modal-content">
	       {{Session::get('info')}}
	    </div>
	  </div>
	</div>
	<!-- 提示信息框 -->
	
	<div class="modal fade" id="qiandao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			    <!--<div class="modal-content">-->
				      <!--<div class="modal-body" onload="draw();">-->
						<!--<canvas id="canvas" width="150" height="150">
				      		<center>
								<img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1525547343312&di=02354016a31a3c86828b78cccb99a4f5&imgtype=0&src=http%3A%2F%2Fpic7.photophoto.cn%2F20080408%2F0034034431511765_b.jpg"  width="100%" title="">图片中的文字
				      		</center>
			      		</canvas>-->
			      		<canvas id="myCanvas" width="555" height="1000">your browser does not support the canvas tag </canvas>
				      <!--</div>-->
			    <!--</div>-->
		  </div>
	</div>
	@endsection
	@section('touxiang')
		<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=1737701412338841415' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
			<div class="container col-md-12 col-sm-12 col-xs-12">
			<!-- 轮播图开始 -->
			<div id="carousel-example-generic" class="carousel slide col-md-8 col-sm-8 col-xs-8" data-ride="carousel">
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
			 <div class="container bs-example col-md-4 col-sm-4 col-xs-4 pull-right" id="user">
			 	<div class="col-md-12 col-sm-12 col-xs-12 ">
			 			<center>
				 			<div> 	
					 		<!-- <img src="home/img/portfolio_pic8.jpg" alt="..." class="img-circle"> -->
					 		<img src="home/img/portfolio_pic8.jpg" alt="头像" class="img-thumbnail">
					 		</div>
					 		<div class="user_gap">
					 			<a href="index">米洛口的公众号↑↑↑↑↑↑</a>
					 		</div>
							<div id="send">
									<a href="#" data-toggle="modal" data-target="#qiandao"  data-whatever="@fat"><button type="button" class="btn btn-info user_gap">签到</button></a><br>
								 	<span>本站目前一共有&nbsp;<b>{{$total}}</b>&nbsp;位门客</span>	<br> 		
								 	<span style="font-family:myFirstFont !important;font-size: 33px;">你的综合排名:<span id="rand">XXX</span></span>		 		
							</div>
						</center>
				</div>
			 </div>
	<!-- 头像结束 -->
		</div>
				<div class="bs-example col-md-8 col-sm-8 col-xs-8" data-example-id="simple-table">
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
				 <!-- </div> -->
				 
			
				<!-- <div class="bs-example col-md-8 col-sm-8 col-xs-8" data-example-id="simple-responsive-table"> -->
				    <div class="table-responsive">
				      <table class="table table-striped">
				      	<caption>本月最佳</caption>
				        <thead>
				          <tr>
				            <th>排名</th>
				            <th>作品名</th>
				            <th>作者</th>
				            <!-- <th>Table heading</th> -->
				          </tr>	
				        </thead>
				        <tbody>
				        @foreach($articles as $key2 =>$article)
				          <tr>
				            <th scope="row">{{$key2+1}}</th>
				            @foreach($article as $key3 => $arti)
					            <td>{{$key3}}</td>
					            <td>{{$arti}}</td>
					            <!-- <td>Table cell</td> -->
				       		 @endforeach
				          </tr>
				        @endforeach
				        </tbody>
				      </table>
				    </div><!-- /.table-responsive -->
		  		</div>
		  		<div class="bs-example col-md-4 col-sm-4 col-xs-4" data-example-id="simple-table" id="newtest">
				    <table class="table table-striped">
				      <caption>排名</caption>
				      <thead>
				        <tr>
				          <th>排名</th>
				          <th>作者</th>
				        </tr>
				      </thead>
				      <tbody>
				      	@foreach($userss as $key => $users)
				        <tr>
				          <th scope="row">{{ $key }}</th>
				          <td>{{$users}}</td>
				        </tr>
				        @endforeach
				      </tbody>
				    </table>
				 </div>
	@endsection
	
