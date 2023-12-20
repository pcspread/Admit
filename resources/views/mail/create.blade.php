@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/report/create.css') }}">
@endsection

@section('title', 'メール通知')

@section('content')
<div class="create-section">
    <form class="create-form" action="/mail" method="POST">
    @csrf
        <div class="create-item">
            <label class="create-item__title" for="email">メールアドレス</label>
            <input class="create-item__input" type="text"  name="email" value="{{ old('email') }}" autofocus>
            <p class="create-item__error">
            @error('email')
                {{ $errors->first('email') }}
            @enderror
            </p>
        </div>
        <div class="create-item">
            <label class="create-item__title" for="title">タイトル</label>
            <input class="create-item__input" type="text"  name="title" value="{{ old('title') }}">
            <p class="create-item__error">
            @error('title')
                {{ $errors->first('title') }}
            @enderror
            </p>
        </div>
        <div class="create-item">
            <label class="create-item__title" for="content">内容</label>
            <textarea class="create-item__textarea" name="content" id="content" rows="8">{{ old('content') }}</textarea>
            <p class="create-item__error">
            @error('content')
                {{ $errors->first('content') }}
            @enderror
            </p>
        </div>
        <button class="create-button">通知する</button>
    </form>
</div>
@endsection