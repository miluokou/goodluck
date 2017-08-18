@extends('layout.index1')
@section('title','注册页')
@section('css')
<style type="text/css">
	#zhuce{
		/*border: 1px solid lightblue;*/
		background-color: white;
		padding-right: 50px;
		margin-top: 200px;
		width: 500px;
		padding-bottom: 40px;
	}
/*	#zhuce label{
		text-align:right; 
		font-size: 16px;
		margin-top: 4px;
	}*/

	label{
		text-align:right; 
		margin-top: 25px;

	}
	#zhuce div{
		margin-top: 20px;
	}
	#button{
		margin-left: 110px;
	}
</style>

@endsection
@section('all')
	<div class="container" id='zhuce'>
		<form method="post" action="/home/doRegister">
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			@if(session('info'))
                     <div class="alert alert-success">
                         <li >
                         {{session('info')}}
                        </li>
                     </div>
            @endif
			<div class="form-group form-group-sm">
			    <label class="col-sm-3 control-label" for="username">用户名:</label>
			    <div class="col-sm-9">
			      <input class="form-control" type="text" id="username" name="username" placeholder="用户名">
			    </div>
			 </div>

			<div class="form-group form-group-sm">
			    <label class="col-sm-3 control-label" for="password">密  码:</label>
			    <div class="col-sm-9">
			      <input class="form-control" type="password" id="password" name="password" placeholder="密码">
			    </div>
			</div>

			<div class="form-group form-group-sm">
			    <label class="col-sm-3 control-label" for="rpassword">确认密码:</label>
			    <div class="col-sm-9">
			      <input class="form-control" type="password" id="rpassword" name="rpassword" placeholder="确认密码">
			    </div>
			</div>

			<div class="form-group form-group-sm">
			    <label class="col-sm-3 control-label" for="vcode">验证码:</label>
			    <div class="col-sm-4">
			      <input class="form-control" type="text" id="vcode" placeholder="验证码" name="vcode">
			    </div>
			    <div class="col-sm-5">
			    	<img src="/home/vcode" onclick="this.src = this.src+'?a'" alt="" style="cursor:pointer">
			    </div>
			</div>
			<!-- <input value="获取短信验证码" type="button"> -->
			{{csrf_field()}}
			<div class="col-sm-12" id="button">
				<button type="submit" class="btn btn-info">注册</button>
			</div>

		</form>
	</div>
	
		
  	</div>
@endsection