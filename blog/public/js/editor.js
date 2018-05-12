$(document).ready(function(){
  var storage = window.localStorage;
  console.log(storage.token);
  console.log(storage.username);
  function yidenglu(){
    if(typeof(storage.token)=="undefined" || typeof(storage.username)=="undefined"){
        console.log("shi undifined");
        alert("请先登录");
        $("#login").click();
      }else{
        var ue = UE.getEditor('editor');
        
        var editbody= JSON.parse(storage.ueditor_preference)['http_www_zhuguangqian_com_edictoreditor-drafts-data'];
        console.log(editbody);
        if(typeof(editbody)!="undefined"){
	        	 ue.ready(function() {//编辑器初始化完成再赋值  
	            ue.setContent(editbody);  //赋值给UEditor  
	        });
        }
       
        function p(s) {
            return s < 10 ? '0' + s: s;
        }
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate(); 
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        var s=myDate.getSeconds();  

        var now=year+'-'+p(month)+"-"+p(date)+" "+p(h)+':'+p(m)+":"+p(s)+"修复问题";
        console.log(now);
        $("#cateselect option[value='11']").attr("selected",true); 
      }
  }
  yidenglu();
  $(document).on("click","#submit",function(){
    var title=$("input[name='title']").val();
    var content = UE.getEditor('editor').getContent();
    var cateselect=$("#cateselect").val();
    var cateselect2=$("#cateselect2").val();
    var cateselect3=$("#cateselect3").val();
    var param={
                'title': title,
                'content':content,
                'cate_father':cateselect,
                'token':window.localStorage.token,
                'uid':window.localStorage.uid
            }
    if(cateselect){
        param['cateselect'] =cateselect;
    }
    if(cateselect2){
        param['cateselect2'] =cateselect2;
    }
    if(cateselect3){
        param['cateselect3'] =cateselect3;
    }
    // console.log(window.localStorage);
    // die;
//     console.log(param);
// alert(param);

    $.ajax({
      type: 'POST',
      url: 'edictor/edit',
      data:param,
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      },
      dataType: 'JSON',
      cache: false,
      async: false,
      success: function(data){
        console.log(data);
        if(data.state){
          window.location = "/home/article/"+data.id;
        }else{
          alert("发布失败");
        }
      },  
      error: function(jqXHR) {
        console.log(jqXHR.status);
      }
    });
  });
});