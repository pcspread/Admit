@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance/over.css') }}">
@endsection

@section('title', '時間外一覧')

@section('content')
<div class="over-section">
    <div class="over-date">
        <a class="last-date"><</a>
        <h1 class="over-date__title">12月</h1>
        <a class="next-date">></a>
    </div>
    <table class="over-table">
        <tr class="table-item">
            <th class="table-title">日付</th>
            <th class="table-title">曜日</th>
            <th class="table-title">内容</th>
        </tr>
        @for ($i = 0; $i < 15; $i++)
        <tr class="table-item">
            <td class="table-content">1日</td>
            <td class="table-content">月曜</td>
            <td class="table-content">9:00～17:00(8時間)(1時間休憩)</td>
        </tr>
        @endfor
    </table>
</div>
@endsection
