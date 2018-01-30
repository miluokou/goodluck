@extends('layout.index')
@section('title', '个人中心')
@section('main_body')
  <script type="text/javascript" src="/js/center.js"></script>

<style type="text/css">
  #center p{
  	padding: 2%;
  }
  #center{
  	padding: 2%;
  }
  #main{
  	padding: 2%;
  }
  #home{
    padding-top:3%;
  }
  .set-btn{
    float: left;
    margin-top:2%;
    margin-right: 2%;
  }
  .set-menu :hover{
    color:blue;
    cursor:pointer
  }
  #add_cate_select label{
    margin-right: 2%;
  }
  #edit_content{
    display: inline-block;
    position: relative;
    width: 100%;
  }
  /*#edit_content div{
    border: 1px gray dashed;*/
    /*margin: 1%;*/
  /*}*/
  .edit_content_right div{
    border: 1px gray dashed;
    margin: 1%;
  }
  #edit_content_right div span{
    float: left;
  }
  .glyphicon .glyphicon-remove{
    line-height: 
  }
/*  #edit_content_right div p{
      margin:auto;
      vertical-align: middle;
  }*/
  .edit_content_right a{
    text-decoration: none;
  }
</style>

<div class="container" id="center">
	<div class="bs-example-tabs" data-example-id="togglable-tabs">
    <div class="">
      <ul id="myTabs" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">类别管理</a></li>
        <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">我的米粒</a></li>
        
      </ul>
    </div>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
        <div role="tabpanel" class="tab-pane fade active in col-md-4" id="home" aria-labelledby="home-tab">
            <div class="set-menu">
              <div class="set-btn set-add" data-cmd="add" title="添加" data-toggle="modal" data-target="#myModal">添加</div>
              <div class="set-btn set-edit" data-cmd="edit" title="编辑" data-toggle="modal" data-target=".bs-example-modal-lg"> 编辑 </div>
            </div>
        </div>
        <div id="main" style="height:800px;font-size:200px;" class="col-md-12 col-sm-12 col-xl-12"></div>
      </div>
      
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary btn-lg" >
        Launch demo modal
      </button>
 -->
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">添加分类</h4>
            </div>
            <div class="modal-body">
              <form action="/addcate" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="recipient-name" class="control-label">子类名称:</label>
                  <input type="text" class="form-control" id="cate_name1" name="cate_name">
                </div>
                <div class="form-group" id="add_cate_select">
                  <label>
                    <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father" id="cateselect">
                            <option value="0">---请选择父类---</option>
                    </select>
                  </label>
                  <label>
                    <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father1" id="cateselect2">
                            <option value="0">---请选择父类---</option>
                    </select>
                  </label>
                  <label>
                    <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father2" id="cateselect3">
                            <option value="0">---请选择父类---</option>
                    </select>
                  </label>
                </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              <button type="submit" class="btn btn-primary">提交</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- 大模态框 -->
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <form action="/editcate" method="post">
                {!! csrf_field() !!}
            <div>
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel2">编辑分类</h4>
              </div>
                <div class="modal-body">
                  <!-- <label> -->
                  <div class="form-group" id="edit_content">
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">编辑名称为:</label>
                        <input type="text" class="form-control" id="cate_name" name="edit_cate_name">
                      </div>
                      <label>
                        <select class="form-control col-md-12 col-sm-12 col-xl-12" name="cate_father4" id="cateselect4">
                                <option value="0">---请选择父类---</option>
                        </select>
                      </label>
                      <!-- <div class="col-md-2 col-sm-2 col-xl-2">
                        类名
                      </div>
                      <div class="col-md-10 col-sm-10 col-xl-10 edit_content_right">
                        <div class="col-md-3 col-sm-3 col-xl-3 ">
                              <a class="glyphicon glyphicon-pencil"></a>
                              <label>分类内容1</label>
                              <a class="glyphicon glyphicon-remove"></a>
                        </div>                
                        <div class="col-md-3 col-sm-3 col-xl-3">
                          分类内容2
                        </div>
                      </div> -->
                      <!-- <hr>
                       <div class="col-md-2 col-sm-2 col-xl-2">
                        类名2
                      </div>
                      <div class="col-md-10 col-sm-10 col-xl-10 edit_content_right">
                        <div class="col-md-3 col-sm-3 col-xl-3 ">
                              <a class="glyphicon glyphicon-pencil"></a>
                              <label>分类内容1</label>
                              <a class="glyphicon glyphicon-remove"></a>
                        </div>                
                        <div class="col-md-3 col-sm-3 col-xl-3">
                          分类内容2
                        </div>
                      </div> -->
                  </div>
                  <!-- </label> -->
                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                  <button type="submit" class="btn btn-primary">提交</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- 大模态框 -->
      <div role="tabpanel" class="tab-pane fade " id="profile" aria-labelledby="profile-tab">
        <p>米粒的内容</p>
      </div>
      <div role="tabpanel" class="tab-pane fade " id="profile2" aria-labelledby="profile-tab2">
          
      </div>
      
      <!-- <div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab">
        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
      </div> -->
    </div>
  </div>
</div>
 <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
    var storage = window.localStorage;

        var myChart = echarts.init(document.getElementById('main'));
        myChart.showLoading();
        // console.log(JSON.parse(storage.cate));
        // var data=JSON.parse(storage.cate);
        var data=JSON.parse(storage.cate);

// $.get('data/asset/data/flare.json', function (data) {
    myChart.hideLoading();

    echarts.util.each(data.children, function (datum, index) {
        index % 2 === 0 && (datum.collapsed = true);
    });

    myChart.setOption(option = {
        tooltip: {
            trigger: 'item',
            triggerOn: 'mousemove'
        },
        series: [
            {
                type: 'tree',

                data: [data],

                top: '1%',
                left: '7%',
                bottom: '1%',
                right: '20%',

                symbolSize: 7,

                label: {
                    normal: {
                        position: 'left',
                        verticalAlign: 'middle',
                        align: 'right',
                        fontSize: 9
                    }
                },

                leaves: {
                    label: {
                        normal: {
                            position: 'right',
                            verticalAlign: 'middle',
                            align: 'left'
                        }
                    }
                },

                expandAndCollapse: true,
                animationDuration: 550,
                animationDurationUpdate: 750
            }
        ]
    });
// });


      </script>
@endsection