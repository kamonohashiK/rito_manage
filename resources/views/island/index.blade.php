@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>島一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>島名</th>
                                <th>都道府県名</th>
                                <th>市区町村名</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($islands as $island): ?>
                            <tr>
                                <td><?= $island->name ?></td>
                                <td>John Doe</td>
                                <td>11-7-2014</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
