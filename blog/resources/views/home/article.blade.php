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
	.list-group ul li a:link{
		color:blue;background-color:green;
	}
     canvas {
      border: 1px solid black; 
  	}
	</style>
@endsection
@section('main_body')
<div class="container" id="article">
	<div class="col-md-3 col-sm-3 col-xs-3">
		<!-- <div class="col-md-1 col-sm-1 col-xs-1">
		</div> -->
		<div class="col-md-11 col-sm-11 col-xs-11" id="course">
		        <h4>
		            文章列表
		        </h4>
		        <ul class="list-group" id="article_list">
		        	@foreach ($articles2 as $articles)
              <!-- var_dump($articles2); -->
		            <li data-id="{{$articles->uid}}">
		                <a href="/home/article/{{$articles->id}}.html" title="">
		                    {{$articles->title}}
		                </a>
		            </li>
		            @endforeach
		        </ul>
<!-- 		        <h4>
		            PHP 表单
		        </h4>
		        <ul>
		            <li>
		                <a href="/php/php_forms.asp" title="PHP Date()">
		                    PHP 表单处理
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_form_validation.asp" title="PHP Include 文件">
		                    PHP 表单验证
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_form_required.asp" title="PHP 文件处理">
		                    PHP 表单必填
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_form_url_email.asp" title="PHP 文件上传">
		                    PHP 表单 URL/E-mail
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_form_complete.asp" title="PHP Cookies">
		                    PHP 表单完成
		                </a>
		            </li>
		        </ul> -->
		</div>
	</div>
	<div class="col-md-9 col-sm-9 col-xs-9" id="content">
		<h3>{{$article_title}}</h3>
		{!! $contents !!}
	</div>
	<canvas id="canvas" width="450" height="450"></canvas>
</div>
  <script type="text/javascript" src="/js/article.js"></script>

<script type="text/javascript">
		window.onload=function(){
		    function clock(){
  var now = new Date();
  var ctx = document.getElementById('canvas').getContext('2d');
  ctx.save();
  ctx.clearRect(0,0,150,150);
  ctx.translate(75,75);
  ctx.scale(0.4,0.4);
  ctx.rotate(-Math.PI/2);
  ctx.strokeStyle = "black";
  ctx.fillStyle = "white";
  ctx.lineWidth = 8;
  ctx.lineCap = "round";

  // Hour marks
  ctx.save();
  for (var i=0;i<12;i++){
    ctx.beginPath();
    ctx.rotate(Math.PI/6);
    ctx.moveTo(100,0);
    ctx.lineTo(120,0);
    ctx.stroke();
  }
  ctx.restore();

  // Minute marks
  ctx.save();
  ctx.lineWidth = 5;
  for (i=0;i<60;i++){
    if (i%5!=0) {
      ctx.beginPath();
      ctx.moveTo(117,0);
      ctx.lineTo(120,0);
      ctx.stroke();
    }
    ctx.rotate(Math.PI/30);
  }
  ctx.restore();
 
  var sec = now.getSeconds();
  var min = now.getMinutes();
  var hr  = now.getHours();
  hr = hr>=12 ? hr-12 : hr;

  ctx.fillStyle = "black";

  // write Hours
  ctx.save();
  ctx.rotate( hr*(Math.PI/6) + (Math.PI/360)*min + (Math.PI/21600)*sec )
  ctx.lineWidth = 14;
  ctx.beginPath();
  ctx.moveTo(-20,0);
  ctx.lineTo(80,0);
  ctx.stroke();
  ctx.restore();

  // write Minutes
  ctx.save();
  ctx.rotate( (Math.PI/30)*min + (Math.PI/1800)*sec )
  ctx.lineWidth = 10;
  ctx.beginPath();
  ctx.moveTo(-28,0);
  ctx.lineTo(112,0);
  ctx.stroke();
  ctx.restore();
 
  // Write seconds
  ctx.save();
  ctx.rotate(sec * Math.PI/30);
  ctx.strokeStyle = "#D40000";
  ctx.fillStyle = "#D40000";
  ctx.lineWidth = 6;
  ctx.beginPath();
  ctx.moveTo(-30,0);
  ctx.lineTo(83,0);
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0,0,10,0,Math.PI*2,true);
  ctx.fill();
  ctx.beginPath();
  ctx.arc(95,0,10,0,Math.PI*2,true);
  ctx.stroke();
  ctx.fillStyle = "rgba(0,0,0,0)";
  ctx.arc(0,0,3,0,Math.PI*2,true);
  ctx.fill();
  ctx.restore();

  ctx.beginPath();
  ctx.lineWidth = 14;
  ctx.strokeStyle = '#325FA2';
  ctx.arc(0,0,142,0,Math.PI*2,true);
  ctx.stroke();

  ctx.restore();

  window.requestAnimationFrame(clock);
}

window.requestAnimationFrame(clock);


		}
</script>
@endsection