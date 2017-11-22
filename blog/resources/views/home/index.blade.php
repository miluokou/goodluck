	@extends('layout.index')
	@section('title', '首页')
	@section('tishixinxi')
	<script type="text/javascript">
		$(document).ready(function(){
				var info1 = $('#helpBlock1').html();
				var info2 = $('#helpBlock2').html();
				var info3 = $('#helpBlock3').html();
				var info4 = $('#helpBlock4').html();
			if(info1 || info2 || info3 || info4){
				console.log(info1);
				console.log(info2);
				console.log(info3);
				console.log(info4);
				$('#register').click();
			}

			$("input[ name='rpass']").focus(function(){
				var pass  = $("input[ name='pass']").val();
				var rpass = $("input[ name='rpass']").val();
				if(pass != rpass){
					$("input[ name='rpass']").popover('show');
				}else{
					$("input[ name='rpass']").popover('hide');
				}
			});

			$("input[ name='rpass']").blur(function(){
				var pass  = $("input[ name='pass']").val();
				var rpass = $("input[ name='rpass']").val();
				if(pass != rpass){
					$("input[ name='rpass']").popover('show');
				}else{
					$("input[ name='rpass']").popover('hide');
				}
			});

			$("input[ name='rpass']").keyup(function(){
				var pass  = $("input[ name='pass']").val();
				var rpass = $("input[ name='rpass']").val();
				if(pass != rpass){
					$("input[ name='rpass']").popover('show');
				}else{
					$("input[ name='rpass']").popover('hide');
				}
			});

			$("input[ name='email']").change(function(){
				var email=  $("input[ name='email']").val();
				// console.log(email);
				 if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
				  {
					$("input[ name='email']").popover('show');
				  }else{
					$("input[ name='email']").popover('hide');
				  }

			});
			$("input[ name='email']").focus(function(){
				var email=  $("input[ name='email']").val();
				// console.log(email);
				 if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
				  {
					$("input[ name='email']").popover('show');
				  }else{
					$("input[ name='email']").popover('hide');
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
			$("input[ name='vcode']").blur(function(){
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
									$("input[ name='vcode']").popover('show');
									$("#vcode_id").attr("disabled",true);
								// 	function hide_popover(){
								// 	$("input[ name='vcode']").popover('hide');
								// 	$("#captcha").click();
								// 	$("#vcode_id").attr("disabled",false);
								// }
								// setTimeout(hide_popover(),15000);	
							},
							error: function(xhr, type){
								$("input[ name='vcode']").popover('hide');
								// alert('network error!');
									console.log(xhr);
							}
						});
					}
				}
			});

			$("input[ name='email_vcode']").blur(function(){
				var email_vcode=  $("input[ name='email_vcode']").val();

				console.log(typeof(vcode.length));
				if(email_vcode.length==6){
					// $("input[ name='vcode']").popover('hide');
					var param ={ date : '2017-11-09'};
					var email=  $("input[ name='email']").val();
					var vcode=  $("input[ name='vcode']").val();

					if(email && vcode){
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
							},
							error: function(xhr, type){
								alert('network error!');
							}
						});
					}
				}
			});
			// 邮件验证结束


		}); 
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
