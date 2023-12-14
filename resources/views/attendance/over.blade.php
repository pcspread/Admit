@php
use App\Models\Attendance;
@endphp

@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance/over.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/attendance/over.js') }}" defer></script>
@endsection

@section('title', '時間外一覧')

@section('content')
<div class="over-section">
    <div class="over-date">
        <a class="last-date" href="/attendance/over?month={{ $subMonth->format('Y-m') }}"><</a>
        <h1 class="over-date__title">{{ $baseDay->format('m月') }}</h1>
        <a class="next-date" href="/attendance/over?month={{ $addMonth->format('Y-m') }}">></a>
    </div>
    <table class="over-table">
        <tr class="table-item">
            <th class="table-title">日付</th>
            <th class="table-title">曜日</th>
            <th class="table-title">勤務時間</th>
            <th class="table-title">時間外</th>
        </tr>
        @foreach ($days as $day)
        @php
        $attendance = new Attendance; 
        $base = Attendance::where('date_at', $day)->first();

        @endphp
        <tr class="table-item">
            <td class="table-content">{{ $day->isoFormat('D日') }}</td>
            <td class="table-content day">{{ $day->isoFormat('dd') }}</td>
            <td class="table-content">{{ $attendance->overAttendance($base) }}</td>
            <td class="table-content">{{ $attendance->overDiffAttendance($base) }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
