@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance/create.css') }}">
@endsection

@section('title', '勤怠管理')

@section('content')
<div class="attendance-section">
    <div class="card-wrapper">
        <form class="card-form" action="">
            <button class="card-button">勤務開始</button>
        </form>
        <form class="card-form" action="">
            <button class="card-button">勤務終了</button>
        </form>
    </div>    
    <div class="card-wrapper">
        <form class="card-form" action="">
            <button class="card-button">休憩開始</button>
        </form>
        <form class="card-form" action="">
            <button class="card-button">休憩終了</button>
        </form>
    </div>    
</div>
@endsection