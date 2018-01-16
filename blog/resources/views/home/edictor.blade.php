@extends('layout.index')

@section('title', '发布文章')

@section('css')
    <link rel="stylesheet" href="/home/edictors/component.css">
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <style type="text/css">
        .selection{
            margin-bottom: 1%;
        }
    </style>
@endsection

@section('nav')
@endsection

@section('main_body')
    <div class="container">
        <form action="edictor/edit" method="post">
            <!-- {{csrf_token()}} -->
            {{ csrf_field() }}
                <center>
                <section class="content bgcolor-8">
                    <span class="input input--isao">
                        <h3>
                        <input class="input__field input__field--isao" type="text" id="title" onfocus="javascript:if(this.value=='文章标题')this.value='';" value="" name="title"/>

                        <label class="input__label input__label--isao" for="title" data-content="">
                            <span class="input__label-content input__label-content--isao"></span>
                        </label>
                        </h3>
                    </span>
                </section>
                </center>
                <div class="col-md-12 col-sm-12 col-xl-12">
                    <div class="col-md-3 col-sm-3 col-xl-3 selection">
                        <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father" id="cateselect">
                            <option value="0">---请选择父类---</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xl-3 selection">
                        <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father1" id="cateselect2">
                            <option value="0">---请选择父类---</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xl-3 selection">
                        <select class="form-control col-md-4 col-sm-4 col-xl-4" name="cate_father2" id="cateselect3">
                            <option value="0">---请选择父类---</option>
                        </select>
                    </div>
                </div>
                <!-- 引用标题 -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <script id="editor" type="text/plain" style="height:500px;width:100%;"></script>
                </div>
                <!-- </center> -->
       
        <!-- <div id="btns">
            <div>
                <button onclick="getAllHtml()">获得整个html的内容</button>
                <button onclick="getContent()">获得内容</button>
                <button onclick="setContent()">写入内容</button>
                <button onclick="setContent(true)">追加内容</button>
                <button onclick="getContentTxt()">获得纯文本</button>
                <button onclick="getPlainTxt()">获得带格式的纯文本</button>
                <button onclick="hasContent()">判断是否有内容</button>
                <button onclick="setFocus()">使编辑器获得焦点</button>
                <button onmousedown="isFocus(event)">编辑器是否获得焦点</button>
                <button onmousedown="setblur(event)" >编辑器失去焦点</button>
            </div>
            <div>
                <button onclick="getText()">获得当前选中的文本</button>
                <button onclick="insertHtml()">插入给定的内容</button>
                <button id="enable" onclick="setEnabled()">可以编辑</button>
                <button onclick="setDisabled()">不可编辑</button>
                <button onclick=" UE.getEditor('editor').setHide()">隐藏编辑器</button>
                <button onclick=" UE.getEditor('editor').setShow()">显示编辑器</button>
                <button onclick=" UE.getEditor('editor').setHeight(300)">设置高度为300默认关闭了自动长高</button>
            </div>

            <div>
                <button onclick="getLocalData()" >获取草稿箱内容</button>
                <button onclick="clearLocalData()" >清空草稿箱</button>
            </div>
        </div> -->
        <!-- <div>
            <button onclick="createEditor()">
            创建编辑器</button>
            <button onclick="deleteEditor()">
            删除编辑器</button>
        </div> -->
        <!-- <input  type="button" class="btn btn-info btn-lg btn-block" value="发布"></input> -->
        <div class="container pull-left" id="submit-btn">
            <div id="submit-btns">
                <!-- <center> -->
                    <input  type="button" class="btn btn-default col-md-2" value="预览"></input>
                    <input  type="submit" class="btn btn-default col-md-2" value="保存草稿"></input>
                    <input  type="button" class="btn btn-info col-md-2" value="发布" id="submit"></input>
                <!-- </center> -->
            </div>
        </div>

        </form>
        
    </div>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
<script type="text/javascript" src="/js/editor.js"></script>
@endsection
