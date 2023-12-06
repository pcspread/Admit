@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/holiday/create.css') }}">
@endsection

@section('title', '休暇申請')

@section('content')
<div class="holiday-section">
    <div class="holiday-item">
        <label class="holiday-item__title" for="">休暇の種類</label>
        <select class="holiday-item__select" name="" id="">
            <option class="holiday-item__option" value="">有給休暇</option>
            <option class="holiday-item__option" value="">育児休暇</option>
            <option class="holiday-item__option" value="">病気休暇</option>
        </select>
        <p class="holiday-item__error"></p>
    </div>
    <div class="holiday-item">
        <label class="holiday-item__title" for="">日付</label>
        <div class="holiday-item__date">
            <input class="holiday-item__input" type="date">
            <span class="holiday-item__span">～</span>
            <input class="holiday-item__input" type="date">
        </div>
        <p class="holiday-item__error"></p>
    </div>
    <div class="holiday-item">
        <label class="holiday-item__title" for="">時間</label>
        <div class="holiday-item__time">
            <input class="holiday-item__input" type="time">
            <span class="holiday-item__span">～</span>
            <input class="holiday-item__input" type="time">
        </div>
        <p class="holiday-item__error"></p>
    </div>
    <button class="holiday-button">申請する </button>
</div>
@endsection