@php
use App\Models\Attendance;
use App\Models\Rest;
@endphp

@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance/list.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/attendance/list.js') }}" defer></script>
@endsection

@section('title', '勤怠一覧')

@section('content')
<div class="list-section">
    <div class="list-date">
        <a class="last-date" href="/attendance/list?month={{ $subMonth->format('Y-m') }}"><</a>
        <h1 class="list-date__title">{{ $baseDay->format('m月') }}</h1>
        <a class="next-date" href="/attendance/list?month={{ $addMonth->format('Y-m') }}">></a>
    </div>
    <table class="list-table">
        <tr class="table-item">
            <th class="table-title">日付</th>
            <th class="table-title">曜日</th>
            <th class="table-title">開始時間</th>
            <th class="table-title">終了時間</th>
            <th class="table-title">勤務合計</th>
            <th class="table-title">休憩詳細</th>
        </tr>

        @foreach ($days as $day)
        
        @php
        $attendance = new Attendance;
        $base_atte = Attendance::where('user_id', Auth::id())->where('date_at', $day)->first();
        @endphp

        <tr class="table-item">
            <td class="table-content">{{ $day->isoFormat('D日') }}</td>
            <td class="table-content day">{{ $day->isoFormat('dd') }}</td>
            <td class="table-content">{{ $attendance->listStartAttendance($base_atte) }}</td>
            <td class="table-content">{{ $attendance->listEndAttendance($base_atte) }}</td>
            <td class="table-content">{{ $attendance->listTotalAttendance($base_atte) }}</td>
            <td class="table-content">
                {!! $attendance->listDetailRest($base_atte) !!}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
