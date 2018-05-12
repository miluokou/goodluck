var ue = UE.getEditor('container');

$(document).on('click', '#title_edit a', function() {
		var title_id = $('#title_edit a').attr('title-id');
		var title = $('#article_title_text').html();
		$('#title_edit').html('<input type="text" name="title_edit_input" value="' + title + '">{!! csrf_field() !!}');
		$('input[name="title_edit_input"]').css("width", '80%');
	})

	.on('click', '#private_public', function() {
		var ppcontent = $("#private_public").html();
		if(Trim(ppcontent) == "公开") {
			$("#private_public").html("私人");
			var p = 1;
		}
		if(Trim(ppcontent) == "私人") {
			$("#private_public").html("公开");
			var p = 0;
		}
		var article_id = $('#edit_contents').attr('title-id');
		var param = {};
		param['article_id'] = article_id;
		param['p'] = p;
		param['token'] = window.localStorage.token;
		console.log(param);
		var url3 = '/article/public';
		var data3 = ajax_post(url3, param);
		if(data3) {
			location.reload();
		}
	})
	.on('click', '#edit_contents', function() {
		if($("#edit_contents").html() == "取消") {
			$('#contents').show();
			$('#container').hide();
			$("#edit_contents").html("编辑");
			$("#update_submit").hide();
		} else {
			var content = $('#contents').html();
			ue.ready(function() {
				//编辑器初始化完成再赋值  
				ue.setContent(content);
				//赋值给UEditor  
			});
			$('#contents').hide();
			$('#container').show();
			$("#edit_contents").html("取消");
			$("#update_submit").show();
			var article_content = UE.getEditor('container').getContent();
			window.localStorage.origion_content = article_content;
		}
	})
	.on('click', '#edit_delete', function() {
		$("#myModal").modal('show');
		$("#sure_delete").click(function() {
			var article_id = $('#edit_contents').attr('title-id');
			var param = {};
			param['article_id'] = article_id;
			var data4 = ajax_post('/article/delete', param);
			if(data4.delete_state) {
				location.href = window.location.protocol + '//' + window.location.host + '/home/article/0';
			}
		});
	})
	.on("click", '#update_submit', function() {
		var origion_content = window.localStorage.origion_content;
		var param = {};
		var article_id = $('#edit_contents').attr('title-id');
		var article_content = UE.getEditor('container').getContent();
		param['article_id'] = article_id;
		param['content'] = article_content;
		param['token'] = window.localStorage.token;
		console.log(param);
		if(origion_content != article_content) {
			var data5 = ajax_post('/edictor/update', param);
		}
		location.reload();
	})
	.on('blur', 'input[name="title_edit_input"]', function() {
		var param = {};
		param['token'] = window.localStorage.token;
		param['username'] = window.localStorage.username;
		param['update_title'] = $('input[name="title_edit_input"]').val();
		param['id'] = $("#edit_contents").attr('title-id');
		var data = ajax_post('/edit_t', param);
		if(data.state) {
			location.reload();
		}
	});
$(document).ready(function() {
	var param = {};
	var article_id = $('#edit_contents').attr('title-id');
	param['token'] = window.localStorage.token;
	param['article_id'] = article_id;
	var window_url = window.location.pathname;
	var reg = new RegExp("/home/article/|.html", "g");
	if(window_url == '/home/article/0.html' || window_url == "/home/article/0") {

	} else {
		if(typeof(param['token']) != 'undefined') {
			var data = ajax_post('/edictor/view_count', param);
		}
	}
	//	   if(typeof(param['token'])!='undefined'){
	var data = ajax_post('/edictor/show_list', param);
	if(data.articles2_new==0){
//		$('#article').html('<center>您还没有写任何文章，发布一篇文章吧</center>');
	}
//	console.log(data.articles2_new);
	var content = foreach_first(data.articles2_new);
	console.log(data);
	console.log(content);
	var content2 = {};
	var title = $('#article_title_text').html();
	title = Trim(title);
	var html = ' <h4>文章列表</h4><ul class="list-group" id="article_list">';
	html += '<ul>';
	for(var i = 0; i < content.i; i++) {
		html += '<span>' + content.k[i] + '</span>';
		content2 = foreach_first(content.v[i]);
		console.log(content2);
		for(var j = 0; j < content2.i; j++) {
			if(content2.v[j].public == 1) {
				html += '<li data-id="' + content2.k[j] + '" style="background:#f5f5f5;">';
				if(title == content2.v[j].title) {
					console.log(content2.v[j].title);
					html += '<a href="/home/article/' + content2.v[j].token + '.html" title="" style="color:rgb(244, 100, 95);">' + content2.v[j].title + '</a></li>';
				} else {
					html += '<a href="/home/article/' + content2.v[j].token + '.html" title="">' + content2.v[j].title + '</a></li>';
				}
			} else {
				html += '<li data-id="' + content2.k[j] + '">';
				if(title == content2.v[j].title) {
					html += '<a href="/home/article/' + content2.v[j].token + '.html" title="" style="color:rgb(244, 100, 95);">' + content2.v[j].title + '</a></li>';
				} else {
					html += '<a href="/home/article/' + content2.v[j].token + '.html" title="">' + content2.v[j].title + '</a></li>';
				}
			}

		}
	}
	html += '</ul>';

	$('#course').html(html);
	var article_id = $("#edit_contents").attr('title-id');
	$('[data-id="' + article_id + '"]').attr("class", "active");
	$('[data-id="' + article_id + '"]').css("font-weight", "bold");
	$('[data-id="' + article_id + '"] a').css("color", "#f4645f");
	var name = $("#article_list li a").attr('href');
	var window_url = window.location.pathname;
	var reg = new RegExp("/home/article/|.html", "g");
	if(window_url == '/home/article/0.html' || window_url == "/home/article/0") {
		location.href = name;
	}
	$('#my-home-exp').attr('href', name);
	$('#container').hide();
	$("#update_submit").hide();
	var param = {};
	param['token'] = window.localStorage.token;
	param['article_id'] = article_id;
	console.log(param);
	var url1 = '/token_yanzheng';
	var url2 = '/home/center';
	var url4 = '/get_token';

	var data2 = ajax_get(url2);
	if(typeof(param['token']) != 'undefined') {
		var data = ajax_post(url1, param);
		var data4 = ajax_post(url4, param);
		if(data) {
			if(data.show_edit) {
				$('#edit_contents_div').remove();
				$('#edit_titles').remove();
			}
		} else {
			console.log(param['token']);
			if(param['token']) {
				alert('请求失败');
			}
		}
	}

	if(data2) {
		var html3 = '<li class="active"><a href="/index">首页</a></li>';
		for(var i = 0; i < data2.children.length; i++) {
			html3 += '<li><a href="#about" class="scroll"><span data-hover="About">' + data2.children[i].name + '</span></a></li>';
		}
		$(".nav.navbar-nav").html(html3);
	}
	if(!window.localStorage.status || !window.localStorage.token) {
		$("#edit_contents_div").remove();
		$("#edit_titles").remove();
	}

})