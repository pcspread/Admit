@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/report/create.css') }}">
@endsection

@section('title', 'メール通知')

@section('content')
<div class="create-section">
    <div class="create-item">
        <label class="create-item__title" for="">タイトル</label>
        <input class="create-item__input" type="text" autofocus>
        <p class="create-item__error"></p>
    </div>
    <div class="create-item">
        <label class="create-item__title" for="">内容</label>
        <textarea class="create-item__textarea" name="" id="" rows="8"></textarea>
        <p class="create-item__error"></p>
    </div>
    <button class="create-button">通知する </button>
</div>
@endsection