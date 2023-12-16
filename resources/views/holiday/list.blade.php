@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/holiday/list.css') }}">
@endsection

@section('title', '休暇申請一覧')

@section('content')
<div class="list-section">
    <table class="list-table">
        @if (count($holidays) > 0)
        <tr class="table-item">
            <th class="table-title">日付</th>
            <th class="table-title">時間</th>
            <th class="table-title">氏名</th>
            <th class="table-title">休暇種類</th>
            <th class="table-title"></th>
        </tr>
        @endif
        @foreach ($holidays as $holiday) 
        <tr class="table-item">
            <td class="table-content">{{ $holiday->listDate($holiday) }}</td>
            <td class="table-content">{{ $holiday->listTime($holiday) }}</td>
            <td class="table-content">{{ $holiday->user['name'] }}</td>
            <td class="table-content">{{ $holiday->genre['name'] }}</td>
            <td class="table-content">
                <form class="table-content__form" action="/holiday/list/{{ $holiday['id'] }}" method="POST">
                @csrf
                    @if ($holiday['approval'] === 0)
                    <button class="table-button">承認する</button>
                    @elseif ($holiday['approval'] === 1)
                    <button class="table-button approval" type="button">承認済</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
        @if (count($holidays) === 0)
        <tr>
            <td>申請がございません</td>
        </tr>
        @endif
    </table>
</div>
@endsection
