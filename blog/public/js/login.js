$(document).ready(function(){
				var info1 = $('#helpBlock1').html();
				var login_info1 = $('#login_helpBlock1').html();
				var info2 = $('#helpBlock2').html();
				var login_info2 = $('#login_helpBlock2').html();
				var info3 = $('#helpBlock3').html();
				var info4 = $('#helpBlock4').html();
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

				//
			if(info1 || info2 || info3 || info4){
				console.log(info1);
				console.log(info2);
				console.log(info3);
				console.log(info4);
				$('#register').click();
			}
			if(login_info1 || login_info2){
				$('#login').click();
			}

			
			$('#btn').on('click',function(obj){

					var countdown=3;
					function settime(obj) {   
				    if (countdown == 0) {   
				        $("#btn").attr("disabled",false);
				        $("#btn").attr('value','点击发送邮箱验证码');
				        countdown = 60;   
				        return;  
				    } else {   
				        $("#btn").attr("disabled",true);  
				        $("#btn").attr("value","稍后可点击重新发送(" + countdown + ")");  
				        countdown--; 
				    } 
					setTimeout(function(){settime();},1000);  
				}
				settime(obj);
				// var vcode=  $("input[ name='vcode']").val();
				// console.log(typeof(vcode.length));
				// if(vcode.length==5){
					var myDate = new Date();
					var param ={ date : myDate};
					var email=  $("input[ name='email']").val();
					
					console.log(register_name);
					console.log(register_pass);
					if(email){
							param['email']=email;
							// param['vcode']=vcode;
							$.ajax({
							type: 'POST',
							url:'/send',
							data: param,
							dataType: 'json',
							headers: {
								'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							},
							success: function(data){
									console.log(data);
									if(data.state){
										// $("#vcode_id").attr('data-content','邮箱验证码发送成功,请填写到下面');
										// $("input[ name='vcode']").popover('show');
				        					$("#btn").attr("disabled",true);
										// }
									}else{
										// $("#vcode_id").attr('data-content','邮箱验证码发送失败,可能是你的验证码写错了，请重新填写验证码发送');
										// $("input[ name='vcode']").popover('show');
				        				$("#btn").attr("disabled",false);  
										$("#captcha").click();
									}
							},
							error: function(xhr, type){
								$("input[ name='vcode']").popover('hide');
							}
						});
					}
				// }
			});
				
			// function settime(obj) {   
			//     if (countdown == 0) {   
			//         obj.removeAttribute("disabled");      
			//         obj.value="免费获取验证码";   
			//         countdown = 60;   
			//         return;  
			//     } else {   
			//         obj.setAttribute("disabled", true);   
			//         obj.value="重新发送(" + countdown + ")";   
			//         countdown--;   
			//     }   
			// setTimeout(settime(obj),1000);   
			// } 

			$("input[ name='rpass']").keyup(function(){
				var pass  = $("input[ name='pass']").val();
				var rpass = $("input[ name='rpass']").val();

				// console.log(pass.length);
				// console.log(rpass.length);
				if(pass.length <= rpass.length){
					if(pass != rpass){
						$("input[ name='rpass']").popover('show');
					}else{
						$("input[ name='rpass']").popover('hide');
					}
				}
			});

			// $("input[ name='rpass']").focus(function(){
			// 	// $("input[ name='rpass']").popover('hide');
			// 	$("#btn").attr("disabled",false);

			// });

			$("input[ name='email']").keyup(function(){
				var email=  $("input[ name='email']").val();
				var register_name=  $("input[ name='name']").val();
				var register_pass=  $("input[ name='pass']").val();
				// console.log(email);
				 if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
				  {
					// $("input[ name='email']").popover('show');
					// $("#vcode_id").attr("disabled",true);
					
				    	$("#btn").attr("disabled",true);
				    	// $("#btn").attr("disabled",true);
				    // }
				  }else{
					// $("input[ name='email']").popover('hide');
					// $("#vcode_id").attr("disabled",false);
						console.log(register_name);
						console.log(typeof(register_name));
					    if(register_name && register_pass){
					    	$("#btn").attr("disabled",false);
						}else{
					        $("#btn").attr('value','上面信息填写不完善，请完善后，点击发送邮箱验证码');
						}
				  }
			});
			$("input[ name='email']").blur(function(){
				var email=  $("input[ name='email']").val();
				var register_name=  $("input[ name='name']").val();
				var register_pass=  $("input[ name='pass']").val();
				// console.log(email);
				 if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
				  {
					// $("input[ name='email']").popover('show');
					// $("#vcode_id").attr("disabled",true);
					
				    	$("#btn").attr("disabled",true);
					// }
				  }else{
					// $("input[ name='email']").popover('hide');
					// $("#vcode_id").attr("disabled",false);
					console.log(register_name);
					console.log(typeof(register_name));
					if(register_name && register_pass){
					    $("#btn").attr("disabled",false);
					}else{
				        $("#btn").attr('value','上面信息填写不完善，请完善后，点击发送邮箱验证码');
					}
				  }
			});
			// $("input[ name='email']").focus(function(){
			// 	$("input[ name='email']").popover('hide');
			// });
			$("input[ name='email']").blur(function(){
				var email=  $("input[ name='email']").val();
				// console.log(email);
				 if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
				  {
					// $("input[ name='email']").popover('show');
					$("#vcode_id").attr("disabled",true);
				  }else{
					// $("input[ name='email']").popover('hide');
					$("#vcode_id").attr("disabled",false);
				  }
			});

			// $("input[ name='vcode']").keyup(function(){
			// 	var vcode=  $("input[ name='vcode']").val();
			// 	if(vcode.length==5){
			// 		$("input[ name='vcode']").popover('hide');
			// 	}else{
			// 		$("input[ name='vcode']").popover('show');
			// 	}
			// });
			$("input[ name='vcode']").focus(function(){
				$("input[ name='vcode']").popover('hide');
			})

			$("input[ name='vcode']").keyup(function(){
				var vcode=  $("input[ name='vcode']").val();
				console.log(typeof(vcode.length));
				if(vcode.length==5){
					// $("input[ name='vcode']").popover('hide');
					var param ={ date : '2017-11-09'};
					var email=  $("input[ name='email']").val();
					if(email){
							param['email']=email;
							param['vcode']=vcode;
							$.ajax({
							type: 'POST',
							url:'/send',
							data: param,
							dataType: 'json',
							headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							},
							success: function(data){
									console.log(data);
									if(data.state){
										$("#vcode_id").attr('data-content','邮箱验证码发送成功,请填写到下面');
										$("input[ name='vcode']").popover('show');
										$("#vcode_id").attr("disabled",true);
										// function vcode_hide(){
										// 	$('#vcode_id').attr('disabled',false);
										// 	$("input[ name='vcode']").popover('hide');
										// }
										// setTimeout(vcode_hide(), 10000);
									}else{
										$("#vcode_id").attr('data-content','邮箱验证码发送失败,可能是你的验证码写错了，请重新填写验证码发送');
										$("input[ name='vcode']").popover('show');
										$("#vcode_id").attr("disabled",false);
										$("#captcha").click();
									}

							},
							error: function(xhr, type){
								$("input[ name='vcode']").popover('hide');
								alert('network error!');
									// console.log(xhr);
							}
						});
					}
				}else{
					$("#vcode_id").attr('data-content','验证码是5位字母或数字');
					$("input[ name='vcode']").popover('show');
				}
			});
			$("input[ name='email_vcode']").focus(function(){
					$("input[ name='vcode']").popover('hide');
			})

			$("input[ name='email_vcode']").keyup(function(){
				var email_vcode=  $("input[ name='email_vcode']").val();
				console.log(email_vcode.length);
				if(email_vcode.length==6){
					// $("input[ name='vcode']").popover('hide');
					var param ={ date : '2017-11-09'};
					var email=  $("input[ name='email']").val();
					// var vcode=  $("input[ name='vcode']").val();
					console.log(email);
					// console.log(vcode);
					if(email){
							param['email']=email;
							// param['vcode']=vcode;
							param['email_vcode']=email_vcode;
							$.ajax({
							type: 'POST',
							url:'/send',
							data: param,
							dataType: 'json',
							headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							},
							success: function(data){
									var pass  = $("input[ name='pass']").val();
									var rpass = $("input[ name='rpass']").val();
									var name = $("input[ name='name']").val();
									if(data.state){
										if(pass || rpass || name){
											$('#regiser_submit').attr("disabled",false);
											$("#vcode_id").attr("disabled",true);
											$("#vcode_id").attr('data-content','邮箱验证码验证成功');
											$("input[ name='vcode']").popover('show');
										}else{
											
											$("#vcode_id").attr('data-content','上边的用户名或者密码没有填');
											$("input[ name='vcode']").popover('show');
										}
									}else{
										// window.location.reload();
										$("#vcode_id").attr("disabled",false);
										$('#captcha').click();
										$("#email_vcode").attr('data-content','验证错误，重新填一下验证号码试一下');
										$("input[ name='email_vcode']").popover('show');
										$("input[ name='email_vcode']").empty();
									}

							},
							error: function(xhr, type){
								alert('network error!');
							}
						});
					}
				}
			});
			// 邮件验证结束
			
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
					$("#logout").attr('id','register');
			});
			
		}); 