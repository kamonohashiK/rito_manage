@extends('adminlte::page')

@section('title', "リトグラフ管理アプリ | {$island->name}")

@section('content_header')
    <h1>{{ $island->name }}</h1>
@stop

@section('content')
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $island->id }}</td>
                    <th>Firestore ID</th>
                    <td>{{ $island->firestore_id }}</td>
                </tr>
                <tr>
                    <th>都道府県</th>
                    <td>{{ $island->cities->first()->prefecture->name }}</td>
                    <th>市区町村</th>
                    <td>{{ $city_name }}
                    </td>
                </tr>
                <tr>
                    <th>読み仮名</th>
                    <td>{{ $island->kana }}</td>
                    <th>英語表記</th>
                    <td>{{ $island->en_name }}</td>
                </tr>
                <tr>
                    <th>緯度</th>
                    <td>{{ $island->lat }}</td>
                    <th>経度</th>
                    <td>{{ $island->lng }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
