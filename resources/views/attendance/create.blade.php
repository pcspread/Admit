@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance/create.css') }}">
@endsection

@section('title', '勤怠管理')

@section('content')
<div class="attendance-section">
    <form class="card-form" action="/attendance" method="POST">
    @csrf
        <button class="card-button" name="attendance" value="start">勤務開始</button>
        <button class="card-button" name="attendance" value="end">勤務終了</button>
    </form>
    <form class="card-form" action="">
        <button class="card-button">休憩開始</button>
        <button class="card-button">休憩終了</button>
    </form>
</div>
@endsection