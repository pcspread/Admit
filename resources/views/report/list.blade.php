@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/report/list.css') }}">
@endsection

@section('title', '日報一覧')

@section('content')
<div class="list-section">
    <div class="list-date">
        <a class="last-date" href="/report/list?date={{ $subDay->toDateString() }}"><</a>
        <h1 class="list-date__title">{{ $base->format('m月d日') }}</h1>
        <a class="next-date" href="/report/list?date={{ $addDay->toDateString() }}">></a>
    </div>
    <table class="list-table">
        <tr class="table-item">
            <th class="table-title">番号</th>
            <th class="table-title">氏名</th>
            <th class="table-title"></th>
        </tr>
        @foreach ($reports as $report)
        <tr class="table-item">
            <td class="table-content">{{ $report['id'] }}</td>
            <td class="table-content">{{ $report->user['name'] }}</td>
            <td class="table-content">
                <a class="table-content__link" href="/report/detail/{{ $report['id'] }}">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
