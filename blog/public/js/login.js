$(document).ready(function(){
			var storage = window.localStorage;
			if(typeof(storage.state)!="undefined" && typeof(storage.token)!="undefined"){
					$("#login").text(storage.username);
					$("#login").attr('data-toggle','');
					$("#register").text("退出");
					$("#register").attr('data-toggle','');
					$("#register").attr('id','logout');
				}
			
			$(document).on('click',"#register_submit",function(){
				var login_name = $("#login_name").val();
				console.log(login_name);
				var login_pass = $("#login_pass").val();
				console.log(login_pass);
				var vcode = $("#vcode_id").val();
					var param ={};
							param['login_pass']=login_pass;
							param['login_name']=login_name;
							param['vcode']=vcode;
							console.log(param);
							$.ajax({
								type: 'POST',
								url:'/login',
								data: param,
								dataType: 'json',
								headers: {
									'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
								},
								success: function(data){
									var token = data.info;
									var username = data.username;
									if(data.state){
										storage.state = storage.token;
										storage.token = token;
										storage.username = username;
										storage.status = JSON.stringify(data.status);
										storage.uid = data.uid;
										storage.rand = data.rand;
										console.log(storage);
										$("#login").text(storage.username);
										$("#register").text("退出");
										$("#register").attr('data-toggle','');
										$("#register").attr('id','logout');
										location.reload();
									}else{
										storage.state = false;
										alert('登录失败');
									}
									console.log(storage);

							},
							error: function(xhr, type){
								alert('network error!');
							}
						});
					
			})
			$(document).on('click',"#logout",function(){
				 window.localStorage.removeItem('token');
				  window.localStorage.removeItem('username');
				  window.localStorage.removeItem('token');
				  window.localStorage.removeItem('uid');
				  window.localStorage.removeItem('status');
				 $("#login").text('登录');
					$("#login").attr('href','#');
					$("#logout").text("注册");
					$("#logout").attr('href','#');
					$("#logout").attr('data-toggle','modal');
					$("#login").attr('data-toggle','modal');
					$("#logout").attr('id','register');

					location.reload();
			});
			
		}); 