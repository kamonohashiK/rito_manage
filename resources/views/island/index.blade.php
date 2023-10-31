@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>島一覧</h1>
@stop

@section('content')
    <?= var_dump($islands) ?>
@stop

@section('css')
    {{-- ページごとCSSの指定
    <link rel="stylesheet" href="/css/xxx.css">
    --}}
@stop

@section('js')
    <script>
        console.log('ページごとJSの記述');
    </script>
@stop
