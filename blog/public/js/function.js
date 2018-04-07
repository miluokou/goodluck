// 去掉空格 好像也能去掉换行
function Trim(str)
{ 
 return str.replace(/(^\s*)|(\s*$)/g, ""); 
}

function ajax_post(url,param){
	var data_all;
	$.ajax({
            type: 'POST',
            url: url,
            dataType: 'JSON',
            data:param,
            cache: false,
            async: false,
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(data) {
				data_all = data
            },  
            error: function(jqXHR) {
				data_all = false;
            }
      });
	return data_all;
}
function ajax_get(url,param){
      var data_all;
      if(typeof(param) == 'undefined'){
            param = {};
      }
	 $.ajax({
        type: 'GET',
        url: url,
        dataType: 'JSON',
        cache: false,
        async: false,
        success: function(data) {
            data_all = data;
          
        },  
        error: function(jqXHR) {
            data_all = false;
        }
      });
	return data_all;
}
function foreach_first(obj){  
    // var obj = obj;
    // return obj;
    var msg ="";
    var k={}
    var v={}
    var i= 0;
    for(var name in obj){  
        k[i]=name;
        v[i]=obj[name];
        i++;
    } 
    var obj_new ={};
     obj_new.k=k;
     obj_new.v=v;
     obj_new.i=i;
    return obj_new;
} 
// function foreach(obj,key,value){  
//     var obj_new = foreach_first(obj);
//     for(var i=0;i<=obj_new.i;i++){
        
//     }
//     // alert(msg);
//     return obj_new;
// } 