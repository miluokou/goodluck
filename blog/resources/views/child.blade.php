<!-- 存放在 resources/views/child.blade.php -->

@extends('layout.app')

@section('title', '改变')

@section('sidebar')
    @parent
    <p>继承layout的 This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>继承layout的 This is my body content.</p>
@endsection