@extends('layout.index')
@section('title', '内容页')
@section('css')
	<style type="text/css">
	#article{
		padding: 2% 0%;
	}
	#content{
		padding:1% 0;
	}
	</style>
@endsection
@section('main_body')
<div class="container" id="article">
	<div class="col-md-2">
		<div class="col-md-1">
		</div>
		<div class="col-md-11" id="course">
		        <h4>
		            PHP 基础教程
		        </h4>
		        <ul>
		            <li class="currentLink">
		                <a href="/php/index.asp" title="PHP 教程">
		                    PHP 教程
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_intro.asp" title="PHP 简介">
		                    PHP 简介
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_install.asp" title="PHP 安装">
		                    PHP 安装
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_syntax.asp" title="PHP 语法">
		                    PHP 语法
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_variables.asp" title="PHP 变量">
		                    PHP 变量
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_echo_print.asp" title="PHP Echo 和 Print 语句">
		                    PHP Echo / Print
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_datatypes.asp" title="PHP 数据类型">
		                    PHP 数据类型
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_string.asp" title="PHP 字符串函数">
		                    PHP 字符串函数
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_constants.asp" title="PHP 常量">
		                    PHP 常量
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_operators.asp" title="PHP 运算符">
		                    PHP 运算符
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_if_else.asp" title="PHP If...Else 语句">
		                    PHP If...Else
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_switch.asp" title="PHP Switch 语句">
		                    PHP Switch
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_looping.asp" title="PHP while 循环">
		                    PHP While 循环
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_looping_for.asp" title="PHP for 循环">
		                    PHP For 循环
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_functions.asp" title="PHP 函数">
		                    PHP 函数
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_arrays.asp" title="PHP 数组">
		                    PHP 数组
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_arrays_sort.asp" title="PHP 数组排序">
		                    PHP 数组排序
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_superglobals.asp" title="PHP 超全局变量">
		                    PHP 超全局
		                </a>
		            </li>
		        </ul>
		        <h4>
		            PHP 表单
		        </h4>
		        <ul>
		            <li>
		                <a href="/php/php_forms.asp" title="PHP Date()">
		                    PHP 表单处理
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_form_validation.asp" title="PHP Include 文件">
		                    PHP 表单验证
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_form_required.asp" title="PHP 文件处理">
		                    PHP 表单必填
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_form_url_email.asp" title="PHP 文件上传">
		                    PHP 表单 URL/E-mail
		                </a>
		            </li>
		            <li>
		                <a href="/php/php_form_complete.asp" title="PHP Cookies">
		                    PHP 表单完成
		                </a>
		            </li>
		        </ul>
		</div>
	</div>
	<div class="col-md-7" id="content">
		<p>
			//初始化你的项目为git仓库<br>
			git init<br>
			//添加所有的文件（注意"."）<br>
			git add .<br>
			//提交注释(每一次提交代码到github的时候必须得写注释，否则也提交不上去)<br>
			git commit -m "first commit"<br>
			//添加源头(你要提交的地址,第一次提交的时候才会设置,设置过了之后就不用设置了)<br>
			git remote add origin https://github.com/用户名/项目名.git<br>
			//提交代码到指定的分支(你要提交的项目地址有可能有多个分支)<br>
			git push -u origin master<br>
		</p>
	</div>
</div>
@endsection