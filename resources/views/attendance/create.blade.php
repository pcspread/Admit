@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance/create.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/attendance/create.js') }}" defer></script>
@endsection

@section('title', '勤怠管理')

@section('content')
<div class="attendance-section">
    <form class="card-form" action="/attendance" method="POST">
    @csrf
        <button class="card-button start" name="attendance" value="start">勤務開始</button>
        <button class="card-button end" name="attendance" value="end">勤務終了</button>
    </form>
    <form class="card-form" action="/attendance" method="POST">
    @method('PATCH')
    @csrf
        <button class="card-button break" name="break" value="break">休憩開始</button>
        <button class="card-button restart" name="break" value="restart">休憩終了</button>
    </form>
</div>
@endsection