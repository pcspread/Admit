@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('title', 'ログイン')

@section('content')
<div class="login-section">
    <form class="login-form">
        <div class="login-item">
            <input class="login-input" type="text" name="email" value="" placeholder="メールアドレス" autofocus>
            <p class="login-error"></p>
        </div>
        <div class="login-item">
            <input class="login-input" type="text" name="password" value="" placeholder="パスワード">
            <p class="login-error"></p>
        </div>
        <button class="login-button">ログインする</button>
        <a class="login-click" href="/register">新規登録はこちら</a>
    </form>
</div>
@endsection