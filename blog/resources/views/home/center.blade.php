@extends('layout.index')
@section('title', '个人中心')
@section('main_body')
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

</style>
<script type="text/javascript">
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
// $(document).ready(function(){
//   $(document).on("click","[data-cmd='add']",function(){
//       alert('123');
//   })
// })
</script>
<script type="text/javascript">
$(document).ready(function(){
  var storage = window.localStorage;
    $.ajax({
        type: 'GET',
        url: 'home/center',
        dataType: 'JSON',
        cache: false,
        async: false,
        success: function(data) {
          console.log(data.info);
          storage.cate= data.info;
          // console.log(data.info.length);
          var html;
      // console.log(storage.cate);
         function isArray(o){
            return Object.prototype.toString.call(o)=='[object Array]';
          }
          for (var i=0;i<data.info.length;i++)
          {
            // console.log(i);
            var j=i+1;
            // if()
            // console.log(j);
            // console.log(isArray(data.info[i]));
            if(isArray(data.info[i])){
              data.info[i]=data.info[i][0];
            }
            if(i==0){
              html = '<option value="'+j+'">'+data.info[i]+'</option>';
            }else{
              html += '<option value="'+j+'">'+data.info[i]+'</option>';
            }
             // console.log(html);
          }
          // console.log(html);
          $("[name='cate_father']").append(html);
         
        },
        error: function(jqXHR) {
          console.log(jqXHR.status);
        }
      });

    $(document).on("change","#cateselect",function(){
      var html;
      console.log(storage.cate);
          // for (var i=0;i<data.info.length;i++)
          // {
          //   // console.log(i);
          //   var j=i+1;
          //   console.log(j);
          //   if(i==0){
          //     html = '<option value="'+j+'">'+data.info[i]+'</option>'
          //   }else{
          //     html += '<option value="'+j+'">'+data.info[i]+'</option>'
          //   }
            
          // }
          // console.log(html);
          // $("[name='cate_father']").append(html);

    })
     
})
</script>

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
              <div class="set-btn set-edit" data-cmd="edit" title="编辑"> 编辑 </div>
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
                  <input type="text" class="form-control" id="cate_name" name="cate_name">
                </div>
                <div class="form-group">
                  <label>
                    <select class="form-control col-md-6 col-sm-6 col-xl-6" name="cate_father" id="cateselect">
                            <option value="0">---请选择父类---</option>
                            <!-- <option value="1">诗歌</option>
                            <option>小说</option>
                            <option>散文</option>
                            <option>剧本</option>
                            <option>寓言</option>
                            <option>童话</option> -->
                            <!-- <option>善良者保护协会</option> -->
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
      <div role="tabpanel" class="tab-pane fade " id="profile" aria-labelledby="profile-tab">
        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
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
        var myChart = echarts.init(document.getElementById('main'));
        myChart.showLoading();
        var data=
          {
 "name": "flare",
 "children": [
  {
   "name": "analytics",
   "children": [
    {
     "name": "cluster",
     "children": [
      {"name": "AgglomerativeCluster", "value": 3938},
      {"name": "CommunityStructure", "value": 3812},
      {"name": "HierarchicalCluster", "value": 6714},
      {"name": "MergeEdge", "value": 743}
     ]
    },
    {
     "name": "graph",
     "children": [
      {"name": "BetweennessCentrality", "value": 3534},
      {"name": "LinkDistance", "value": 5731},
      {"name": "MaxFlowMinCut", "value": 7840},
      {"name": "ShortestPaths", "value": 5914},
      {"name": "SpanningTree", "value": 3416}
     ]
    },
    {
     "name": "optimization",
     "children": [
      {"name": "AspectRatioBanker", "value": 7074}
     ]
    }
   ]
  },
  {
   "name": "animate",
   "children": [
    {"name": "Easing", "value": 17010},
    {"name": "FunctionSequence", "value": 5842},
    {
     "name": "interpolate",
     "children": [
      {"name": "ArrayInterpolator", "value": 1983},
      {"name": "ColorInterpolator", "value": 2047},
      {"name": "DateInterpolator", "value": 1375},
      {"name": "Interpolator", "value": 8746},
      {"name": "MatrixInterpolator", "value": 2202},
      {"name": "NumberInterpolator", "value": 1382},
      {"name": "ObjectInterpolator", "value": 1629},
      {"name": "PointInterpolator", "value": 1675},
      {"name": "RectangleInterpolator", "value": 2042}
     ]
    },
    {"name": "ISchedulable", "value": 1041},
    {"name": "Parallel", "value": 5176},
    {"name": "Pause", "value": 449},
    {"name": "Scheduler", "value": 5593},
    {"name": "Sequence", "value": 5534},
    {"name": "Transition", "value": 9201},
    {"name": "Transitioner", "value": 19975},
    {"name": "TransitionEvent", "value": 1116},
    {"name": "Tween", "value": 6006}
   ]
  },
  {
   "name": "data",
   "children": [
    {
     "name": "converters",
     "children": [
      {"name": "Converters", "value": 721},
      {"name": "DelimitedTextConverter", "value": 4294},
      {"name": "GraphMLConverter", "value": 9800},
      {"name": "IDataConverter", "value": 1314},
      {"name": "JSONConverter", "value": 2220}
     ]
    },
    {"name": "DataField", "value": 1759},
    {"name": "DataSchema", "value": 2165},
    {"name": "DataSet", "value": 586},
    {"name": "DataSource", "value": 3331},
    {"name": "DataTable", "value": 772},
    {"name": "DataUtil", "value": 3322}
   ]
  },
  {
   "name": "display",
   "children": [
    {"name": "DirtySprite", "value": 8833},
    {"name": "LineSprite", "value": 1732},
    {"name": "RectSprite", "value": 3623},
    {"name": "TextSprite", "value": 10066}
   ]
  },
  {
   "name": "flex",
   "children": [
    {"name": "FlareVis", "value": 4116}
   ]
  },
  {
   "name": "physics",
   "children": [
    {"name": "DragForce", "value": 1082},
    {"name": "GravityForce", "value": 1336},
    {"name": "IForce", "value": 319},
    {"name": "NBodyForce", "value": 10498},
    {"name": "Particle", "value": 2822},
    {"name": "Simulation", "value": 9983},
    {"name": "Spring", "value": 2213},
    {"name": "SpringForce", "value": 1681}
   ]
  },
  {
   "name": "query",
   "children": [
    {"name": "AggregateExpression", "value": 1616},
    {"name": "And", "value": 1027},
    {"name": "Arithmetic", "value": 3891},
    {"name": "Average", "value": 891},
    {"name": "BinaryExpression", "value": 2893},
    {"name": "Comparison", "value": 5103},
    {"name": "CompositeExpression", "value": 3677},
    {"name": "Count", "value": 781},
    {"name": "DateUtil", "value": 4141},
    {"name": "Distinct", "value": 933},
    {"name": "Expression", "value": 5130},
    {"name": "ExpressionIterator", "value": 3617},
    {"name": "Fn", "value": 3240},
    {"name": "If", "value": 2732},
    {"name": "IsA", "value": 2039},
    {"name": "Literal", "value": 1214},
    {"name": "Match", "value": 3748},
    {"name": "Maximum", "value": 843},
    {
     "name": "methods",
     "children": [
      {"name": "add", "value": 593},
      {"name": "and", "value": 330},
      {"name": "average", "value": 287},
      {"name": "count", "value": 277},
      {"name": "distinct", "value": 292},
      {"name": "div", "value": 595},
      {"name": "eq", "value": 594},
      {"name": "fn", "value": 460},
      {"name": "gt", "value": 603},
      {"name": "gte", "value": 625},
      {"name": "iff", "value": 748},
      {"name": "isa", "value": 461},
      {"name": "lt", "value": 597},
      {"name": "lte", "value": 619},
      {"name": "max", "value": 283},
      {"name": "min", "value": 283},
      {"name": "mod", "value": 591},
      {"name": "mul", "value": 603},
      {"name": "neq", "value": 599},
      {"name": "not", "value": 386},
      {"name": "or", "value": 323},
      {"name": "orderby", "value": 307},
      {"name": "range", "value": 772},
      {"name": "select", "value": 296},
      {"name": "stddev", "value": 363},
      {"name": "sub", "value": 600},
      {"name": "sum", "value": 280},
      {"name": "update", "value": 307},
      {"name": "variance", "value": 335},
      {"name": "where", "value": 299},
      {"name": "xor", "value": 354},
      {"name": "-", "value": 264}
     ]
    },
    {"name": "Minimum", "value": 843},
    {"name": "Not", "value": 1554},
    {"name": "Or", "value": 970},
    {"name": "Query", "value": 13896},
    {"name": "Range", "value": 1594},
    {"name": "StringUtil", "value": 4130},
    {"name": "Sum", "value": 791},
    {"name": "Variable", "value": 1124},
    {"name": "Variance", "value": 1876},
    {"name": "Xor", "value": 1101}
   ]
  },
  {
   "name": "scale",
   "children": [
    {"name": "IScaleMap", "value": 2105},
    {"name": "LinearScale", "value": 1316},
    {"name": "LogScale", "value": 3151},
    {"name": "OrdinalScale", "value": 3770},
    {"name": "QuantileScale", "value": 2435},
    {"name": "QuantitativeScale", "value": 4839},
    {"name": "RootScale", "value": 1756},
    {"name": "Scale", "value": 4268},
    {"name": "ScaleType", "value": 1821},
    {"name": "TimeScale", "value": 5833}
   ]
  },
  {
   "name": "util",
   "children": [
    {"name": "Arrays", "value": 8258},
    {"name": "Colors", "value": 10001},
    {"name": "Dates", "value": 8217},
    {"name": "Displays", "value": 12555},
    {"name": "Filter", "value": 2324},
    {"name": "Geometry", "value": 10993},
    {
     "name": "heap",
     "children": [
      {"name": "FibonacciHeap", "value": 9354},
      {"name": "HeapNode", "value": 1233}
     ]
    },
    {"name": "IEvaluable", "value": 335},
    {"name": "IPredicate", "value": 383},
    {"name": "IValueProxy", "value": 874},
    {
     "name": "math",
     "children": [
      {"name": "DenseMatrix", "value": 3165},
      {"name": "IMatrix", "value": 2815},
      {"name": "SparseMatrix", "value": 3366}
     ]
    },
    {"name": "Maths", "value": 17705},
    {"name": "Orientation", "value": 1486},
    {
     "name": "palette",
     "children": [
      {"name": "ColorPalette", "value": 6367},
      {"name": "Palette", "value": 1229},
      {"name": "ShapePalette", "value": 2059},
      {"name": "SizePalette", "value": 2291}
     ]
    },
    {"name": "Property", "value": 5559},
    {"name": "Shapes", "value": 19118},
    {"name": "Sort", "value": 6887},
    {"name": "Stats", "value": 6557},
    {"name": "Strings", "value": 22026}
   ]
  },
  {
   "name": "vis",
   "children": [
    {
     "name": "axis",
     "children": [
      {"name": "Axes", "value": 1302},
      {"name": "Axis", "value": 24593},
      {"name": "AxisGridLine", "value": 652},
      {"name": "AxisLabel", "value": 636},
      {"name": "CartesianAxes", "value": 6703}
     ]
    },
    {
     "name": "controls",
     "children": [
      {"name": "AnchorControl", "value": 2138},
      {"name": "ClickControl", "value": 3824},
      {"name": "Control", "value": 1353},
      {"name": "ControlList", "value": 4665},
      {"name": "DragControl", "value": 2649},
      {"name": "ExpandControl", "value": 2832},
      {"name": "HoverControl", "value": 4896},
      {"name": "IControl", "value": 763},
      {"name": "PanZoomControl", "value": 5222},
      {"name": "SelectionControl", "value": 7862},
      {"name": "TooltipControl", "value": 8435}
     ]
    },
    {
     "name": "data",
     "children": [
      {"name": "Data", "value": 20544},
      {"name": "DataList", "value": 19788},
      {"name": "DataSprite", "value": 10349},
      {"name": "EdgeSprite", "value": 3301},
      {"name": "NodeSprite", "value": 19382},
      {
       "name": "render",
       "children": [
        {"name": "ArrowType", "value": 698},
        {"name": "EdgeRenderer", "value": 5569},
        {"name": "IRenderer", "value": 353},
        {"name": "ShapeRenderer", "value": 2247}
       ]
      },
      {"name": "ScaleBinding", "value": 11275},
      {"name": "Tree", "value": 7147},
      {"name": "TreeBuilder", "value": 9930}
     ]
    },
    {
     "name": "events",
     "children": [
      {"name": "DataEvent", "value": 2313},
      {"name": "SelectionEvent", "value": 1880},
      {"name": "TooltipEvent", "value": 1701},
      {"name": "VisualizationEvent", "value": 1117}
     ]
    },
    {
     "name": "legend",
     "children": [
      {"name": "Legend", "value": 20859},
      {"name": "LegendItem", "value": 4614},
      {"name": "LegendRange", "value": 10530}
     ]
    },
    {
     "name": "operator",
     "children": [
      {
       "name": "distortion",
       "children": [
        {"name": "BifocalDistortion", "value": 4461},
        {"name": "Distortion", "value": 6314},
        {"name": "FisheyeDistortion", "value": 3444}
       ]
      },
      {
       "name": "encoder",
       "children": [
        {"name": "ColorEncoder", "value": 3179},
        {"name": "Encoder", "value": 4060},
        {"name": "PropertyEncoder", "value": 4138},
        {"name": "ShapeEncoder", "value": 1690},
        {"name": "SizeEncoder", "value": 1830}
       ]
      },
      {
       "name": "filter",
       "children": [
        {"name": "FisheyeTreeFilter", "value": 5219},
        {"name": "GraphDistanceFilter", "value": 3165},
        {"name": "VisibilityFilter", "value": 3509}
       ]
      },
      {"name": "IOperator", "value": 1286},
      {
       "name": "label",
       "children": [
        {"name": "Labeler", "value": 9956},
        {"name": "RadialLabeler", "value": 3899},
        {"name": "StackedAreaLabeler", "value": 3202}
       ]
      },
      {
       "name": "layout",
       "children": [
        {"name": "AxisLayout", "value": 6725},
        {"name": "BundledEdgeRouter", "value": 3727},
        {"name": "CircleLayout", "value": 9317},
        {"name": "CirclePackingLayout", "value": 12003},
        {"name": "DendrogramLayout", "value": 4853},
        {"name": "ForceDirectedLayout", "value": 8411},
        {"name": "IcicleTreeLayout", "value": 4864},
        {"name": "IndentedTreeLayout", "value": 3174},
        {"name": "Layout", "value": 7881},
        {"name": "NodeLinkTreeLayout", "value": 12870},
        {"name": "PieLayout", "value": 2728},
        {"name": "RadialTreeLayout", "value": 12348},
        {"name": "RandomLayout", "value": 870},
        {"name": "StackedAreaLayout", "value": 9121},
        {"name": "TreeMapLayout", "value": 9191}
       ]
      },
      {"name": "Operator", "value": 2490},
      {"name": "OperatorList", "value": 5248},
      {"name": "OperatorSequence", "value": 4190},
      {"name": "OperatorSwitch", "value": 2581},
      {"name": "SortOperator", "value": 2023}
     ]
    },
    {"name": "Visualization", "value": 16540}
   ]
  }
 ]
}

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