@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/report/list.css') }}">
@endsection

@section('title', '日報一覧')

@section('content')
<div class="list-section">
    <div class="list-date">
        <a class="last-date"><</a>
        <h1 class="list-date__title">12月1日</h1>
        <a class="next-date">></a>
    </div>
    <table class="list-table">
        <tr class="table-item">
            <th class="table-title">番号</th>
            <th class="table-title">氏名</th>
            <th class="table-title"></th>
        </tr>
        @for ($i = 0; $i < 15; $i++)
        <tr class="table-item">
            <td class="table-content">1</td>
            <td class="table-content">中山太郎</td>
            <td class="table-content">
                <a class="table-content__link" href="/report/detail/1">詳細</a>
            </td>
        </tr>
        @endfor
    </table>
</div>
@endsection
