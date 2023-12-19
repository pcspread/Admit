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
        @if (count($reports) > 0)
        <tr class="table-item">
            <th class="table-title">番号</th>
            <th class="table-title">氏名</th>
            <th class="table-title"></th>
            <th class="table-title"></th>
        </tr>
        @endif
        @foreach ($reports as $report)
        <tr class="table-item">
            <td class="table-content">{{ $report['id'] }}</td>
            <td class="table-content">{{ $report->user['name'] }}</td>
            <td class="table-content">
                <a class="table-content__link" href="/report/detail/{{ $report['id'] }}">詳細</a>
            </td>
            <td class="table-content">
                <form class="table-content__form" action="/report/list/{{ $report['id'] }}" method="POST">
                @csrf
                    @if (!$report['check'])
                    <button class="table-content__form-button">未確認</button>
                    @else
                    <button class="table-content__form-button checked" type="button">確認済</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
        @if (count($reports) === 0)
        <tr class="table-item">
            <td class="table-content">日報情報がございません</td>
        </tr>
        @endif
    </table>
</div>
@endsection
