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

    <h5 class="mb-2">質問</h5>
    <? @if ($island->questions->count() > 0)
                                                                    : ?>
    <div class="card">
        <? @foreach ($island->questions as $question)
    : ?>
        <div class="card-header">
            <h3 class="card-title">{{ $question->question }}</h3>
            <div class="card-tools">
                <a>編集リンク</a>
            </div>
        </div>
        <div class="card-body">
            <? @if ($question->answers->count() > 0)
    : ?>
            <? @foreach ($question->answers as $answer)
    : ?>
            {{ $answer->answer }}
            <br>
            <a><i class="fas fa-edit"></i>編集リンク</a>
            <hr>

            <?
    @endforeach; ?>
            <? @else: ?>
            <p>この質問に対する回答はありません。</p>
            <?
    @endif; ?>
        </div>
        <?
    @endforeach; ?>
    </div>
    <? @else: ?>
    <p>この島に関する質問はありません。</p>
    <? @endif; ?>
@stop
