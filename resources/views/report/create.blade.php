@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/report/create.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/report\create.js') }}" defer></script>
@endsection

@section('title', '日報報告')

@section('content')
<div class="create-section">
    <form class="create-form" action="/report" method="POST">
    @csrf
        <div class="create-item">
            <label class="create-item__title" for="date">日付</label>
            <input class="create-item__input" id="date" type="date" name="date" value="old('date')">
            <p class="create-item__error">
            @error('date')
                {{ $errors->first('date') }}
            @enderror
            </p>
        </div>
        <div class="create-item">
            <label class="create-item__title" for="content">内容</label>
            <textarea class="create-item__textarea" id="content" name="content" rows="8">{{ old('content') }}</textarea>
            <p class="create-item__error">
            @error('content')
                {{ $errors->first('content') }}
            @enderror
            </p>
        </div>
        <button class="create-button" onclick="return confirmReport()">報告する </button>
    </form>
</div>
@endsection