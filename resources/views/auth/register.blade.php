@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('title', '新規登録')

@section('content')
<div class="register-section">
    <form class="register-form">
        <div class="register-item">
            <input class="register-input" type="text" name="name" value="" placeholder="氏名" autofocus>
            <p class="register-error"></p>
        </div>
        <div class="register-item">
            <input class="register-input" type="text" name="email" value="" placeholder="メールアドレス">
            <p class="register-error"></p>
        </div>
        <div class="register-item">
            <input class="register-input" type="text" name="password" value="" placeholder="パスワード">
            <p class="register-error"></p>
        </div>
        <div class="register-item">
            <input class="register-input" type="text" name="password_confirmation" value="" placeholder="確認用パスワード">
            <p class="register-error"></p>
        </div>
        <button class="register-button">新規登録する</button>
        <a class="register-click" href="/login">ログインはこちら</a>
    </form>
</div>
@endsection