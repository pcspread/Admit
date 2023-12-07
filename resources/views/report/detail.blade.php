@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/report/detail.css') }}">
@endsection

@section('title', '日報詳細')

@section('content')
<div class="detail-section">
    <div class="detail__top-block">
        <h1 class="top-block__name">中山太郎</h1>
        <a class="top-block__button" href="/report/list">戻る</a>
    </div>
    <p class="detail-date">12月1日</p>
    <p class="detail-content">
        午前中、会社Aへ提案。
        午後、会社Bへ打ち合わせ。
    </p>
</div>
@endsection