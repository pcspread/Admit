@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/holiday/create.css') }}">
@endsection

@section('title', '休暇申請')

@section('content')
<div class="holiday-section">
    <form class="holiday-form" action="/holiday" method="POST">
    @csrf
        <div class="holiday-item">
            <label class="holiday-item__title">休暇の種類</label>
            <select class="holiday-item__select" name="genre_id">
                @foreach ($genres as $genre)
                <option class="holiday-item__option" value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                @endforeach
            </select>
            <p class="holiday-item__error"></p>
        </div>
        <div class="holiday-item">
            <label class="holiday-item__title">日付</label>
            <div class="holiday-item__date">
                <input class="holiday-item__input" type="date" name="date1" value="{{ old('date1') }}">
                <span class="holiday-item__span">～</span>
                <input class="holiday-item__input" type="date" name="date2" value="{{ old('date2') }}">
            </div>
            <p class="holiday-item__error">
            @error('date2')
                {{ $errors->first('date2') }}
            @enderror
            </p>
        </div>
        <div class="holiday-item">
            <label class="holiday-item__title">時間</label>
            <div class="holiday-item__time">
                <input class="holiday-item__input" type="time" name="time1" value="{{ old('time1') }}">
                <span class="holiday-item__span">～</span>
                <input class="holiday-item__input" type="time" name="time2" value="{{ old('time2') }}">
            </div>
            <p class="holiday-item__error">
            @error('time2')
                {{ $errors->first('time2') }}
            @enderror
            </p>
        </div>
        <button class="holiday-button">申請する </button>
    </form>
</div>
@endsection