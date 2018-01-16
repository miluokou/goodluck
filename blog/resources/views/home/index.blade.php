	@extends('layout.index')
	@section('title', '首页')
	@section('tishixinxi')
	<script type="text/javascript" src="js/register.js"></script>
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
	<!-- 头像开始 -->
			 <div class="container bs-example col-md-4 col-sm-4 col-xs-4 pull-right" id="user">
			 	<div class="container col-md-12 col-sm-12 col-xs-12 ">
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
								 	<span>你的综合排名:XXX</span>		 		
							</div>
						</center>
				</div>
			 </div>
	<!-- 头像结束 -->
	@endsection
	
