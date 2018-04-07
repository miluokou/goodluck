$(document).ready(function(){
	var info1 = $('#helpBlock1').html();
	var login_info1 = $('#login_helpBlock1').html();
	var info2 = $('#helpBlock2').html();
	var login_info2 = $('#login_helpBlock2').html();
	var info3 = $('#helpBlock3').html();
	var info4 = $('#helpBlock4').html();
	var storage = window.localStorage;
	
	console.log(storage);
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
	
	function sub_disable(duixiang){
		$(duixiang).keyup(function(){
			var register_name = $('#register_name').val();
			var register_pass = $('#register_pass').val();
			var register_rpass = $('#register_rpass').val();
			var vcode_id2 = $('#vcode_id2').val();
			if(register_name && register_pass && register_rpass &&vcode_id2){
				$('#regiser_submit').attr('disabled',false);
			}else{
				$('#regiser_submit').attr('disabled',true);
			}
		});
	}
	
	sub_disable("input[ name='name']");
	sub_disable("input[ name='vcode']");
	sub_disable("input[ name='pass']");
	sub_disable("input[ name='rpass']");

})