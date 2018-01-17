$(document).ready(function(){
			var storage = window.localStorage;
			if(typeof(storage.state)!="undefined" && typeof(storage.token)!="undefined"){
					// storage.state = storage.token;
					// storage.token = token;
					// storage.username = username;
					$("#login").text(storage.username);
					$("#login").attr('data-toggle','');
					$("#register").text("退出");
					$("#register").attr('data-toggle','');
					$("#register").attr('id','logout');
				}
				//登出 			
			
			$(document).on('click',"#register_submit",function(){
				var login_name = $("#login_name").val();
				console.log(login_name);
				var login_pass = $("#login_pass").val();
				console.log(login_pass);
					var param ={};

				// if(login_name && login_pass){
							param['login_pass']=login_pass;
							param['login_name']=login_name;
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
									console.log(storage);
									$("#login").text(storage.username);
									$("#register").text("退出");
									$("#register").attr('data-toggle','');
									$("#register").attr('id','logout');
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
					// }else{
					// 	alert("账号或者密码忘记填写");
					// 	// $("#login").click();
					// }
					
			})
			$(document).on('click',"#logout",function(){
				 localStorage.removeItem('token');
				 localStorage.removeItem('username');
				 $("#login").text('登录');
					$("#login").attr('href','#');
					$("#logout").text("注册");
					$("#logout").attr('href','#');
					$("#logout").attr('data-toggle','modal');
					$("#login").attr('data-toggle','modal');
					$("#logout").attr('id','register');
			});
			
		}); 