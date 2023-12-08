@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('title', '新規登録')

@section('content')
<div class="register-section">
    <form class="register-form" action="/register" method="POST">
    @csrf
        <div class="register-item">
            <input class="register-input" type="text" name="name" value="" placeholder="氏名" autofocus>
            <p class="register-error">
            @error('name')
                {{ $errors->first('name') }}
            @enderror
            </p>
        </div>
        <div class="register-item">
            <input class="register-input" type="text" name="email" value="" placeholder="メールアドレス">
            <p class="register-error">
            @error('email')
                {{ $errors->first('email') }}
            @enderror
            </p>
        </div>
        <div class="register-item">
            <input class="register-input" type="password" name="password" value="" placeholder="パスワード">
            <p class="register-error">
            @error('password')
                {{ $errors->first('password') }}
            @enderror                
            </p>
        </div>
        <div class="register-item">
            <input class="register-input" type="password" name="password_confirmation" value="" placeholder="確認用パスワード">
            <p class="register-error">
            @error('password_confirmation')
                {{ $errors->first('password_confirmation') }}
            @enderror
            </p>
        </div>
        <button class="register-button">新規登録する</button>
        <a class="register-click" href="/login">ログインはこちら</a>
    </form>
</div>
@endsection