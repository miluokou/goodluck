	@extends('layout.index')
	@section('title', '首页')
	@section('tishixinxi')
	<script type="text/javascript" src="/js/register.js"></script>
	<script type="text/javascript" src="/js/center.js"></script>
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
									<a href="/edictor"><button type="button" class="btn btn-info user_gap">发布文章</button></a><br>
								 	<span>本站目前一共有&nbsp;<b>{{$total}}</b>&nbsp;位门客</span>	<br> 		
								 	<span>你的综合排名:<span id="rand">XXX</span></span>		 		
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
	
