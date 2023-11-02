@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>島一覧</h1>
@stop

@section('content')
    <x-islands-table :islands="$islands" />

    @if ($islands->hasPages())
        <div class="card-footer clearfix">
            {{ $islands->links() }}
        </div>
    @endif
@stop
