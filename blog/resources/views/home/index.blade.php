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
