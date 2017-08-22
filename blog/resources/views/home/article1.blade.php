@extends('layout.index')
@section('title', '文章页')
@section('main_body')
<div class="container" id="article">
	<div class="col-md-2">
	</div>
	<div class="col-md-3">
		<h4>第一小节的标题</h4>
		<ul>
			<li>第一小节</li>
			<li>第二小节</li>
			<li>第三小节</li>
		</ul>
	</div>
	<div class="col-md-7">
		<p>正文的内容</p>
	</div>
</div>
@endsection