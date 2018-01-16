$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
  function isArray(o){
        return Object.prototype.toString.call(o)=='[object Array]';
  }
$(document).ready(function(){
  var storage = window.localStorage;
    $.ajax({
        type: 'GET',
        url: 'home/center',
        dataType: 'JSON',
        cache: false,
        async: false,
        success: function(data) {
          console.log(typeof(data.children));
          console.log(data.res2);
          storage.cate=JSON.stringify(data);
          // console.log(storage.cate);
          $("#cateselect2").hide();
          $("#cateselect3").hide();
          html = '<option value="0">---请选择分类---</option>';
          for(var i=0;i<data.children.length;i++){
              html += '<option value="'+data.children[i].value+'">'+data.children[i].name+'</option>';
          }
          $("[name='cate_father']").html(html);
          html2='<option value="0">---请选择分类---</option>';
          for(var y=0;y<data.res2.length;y++){
              html2 += '<option value="'+data.res2[y].id+'">'+data.res2[y].name+'</option>';
          }
          $("[name='cate_father4']").html(html2);
          var html3 = '<li class="active"><a href="/index">首页</a></li>';
          for(var i=0;i<data.children.length;i++){
              // html += '<option value="'+data.children[i].value+'">'+data.children[i].name+'</option>';
              html3+='<li><a href="#about" class="scroll"><span data-hover="About">'+data.children[i].name+'</span></a></li>';
          }
          $(".nav.navbar-nav").html(html3);

          // var html4 = $("#link-effect-2").html();
          // console.log(html4);
        },  
        error: function(jqXHR) {
          console.log(jqXHR.status);
        }
      });
 // var storage = window.localStorage;
    console.log(JSON.parse(storage.status));
    if(JSON.parse(storage.status)=="门客"){
      $("[data-cmd='add']").remove();
      $("[data-cmd='edit']").remove();
    }
    $(document).on("change","#cateselect",function(){
      var html;
      var cate=JSON.parse(storage.cate);
      var cateselect = $("#cateselect").val();
      console.log(cate);
      console.log(cateselect);
      html = '<option value="0">---请选择二级分类---</option>';
      for(var i=0;i<cate.children.length;i++){
          if(cate.children[i].value==cateselect){
            console.log(cate.children[i].value);
            console.log(cate.children[i].name);
            if(isArray(cate.children[i].children)){
                $("#cateselect2").show();
                for(var j=0;j<cate.children[i].children.length;j++){
                  // console.log(cate.children[i].children[j].children);
                  if(!isArray(cate.children[i].children[j].children)){
                    $("#cateselect3").hide();
                  }
                   html += '<option value="'+cate.children[i].children[j].value+'">'+cate.children[i].children[j].name+'</option>';
                }
              $("[name='cate_father1']").html(html);
            }else{
                $("#cateselect2").hide();
                $("#cateselect3").hide();
            }
          }
          // html += '<option value="'+data.children[i].value+'">'+data.children[i].name+'</option>';
      }

    });
    $(document).on("change","#cateselect2",function(){
      var html;
      html = '<option value="0">---请选择三级分类---</option>';
      var cate=JSON.parse(storage.cate);
      var cateselect = $("#cateselect").val();
      var cateselect2=$("#cateselect2").val();
      console.log(cateselect);
      console.log(cateselect2);

      for(var i=0;i<cate.children.length;i++){
        if(cate.children[i].value==cateselect){
            if(isArray(cate.children[i].children)){
                console.log(cate.children[i].children);
                for(var j=0;j<cate.children[i].children.length;j++){
                  if(cate.children[i].children[j].value==cateselect2){
                    if(isArray(cate.children[i].children[j].children)){
                      $("#cateselect3").show();
                      for(var x=0;x<cate.children[i].children[j].children.length;x++){
                         html += '<option value="'+cate.children[i].children[j].children[x].value+'">'+cate.children[i].children[j].children[x].name+'</option>';
                      }
                    }else{
                      $("#cateselect3").hide();
                    }
                  }
                }
             }
          }
      }
              $("[name='cate_father2']").html(html);

      console.log(cate);
      console.log(cateselect);
      console.log(cateselect2);

      html = '<option value="0">---请选择三级分类---</option>';

      for(var i=0;i<cate.children.length;i++){
          console.log(cate.children[i].value);
        if(cate.children[i].value==cateselect2){
          for(var j=0;j<cate.children[i].children.length;j++){
            var_dump(cate.children[i].children);
          }
        }
      }
    });
        
     
})