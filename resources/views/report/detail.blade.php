@php
use Carbon\Carbon;
@endphp

@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/report/detail.css') }}">
@endsection

@section('title', '日報詳細')

@section('content')
<div class="detail-section">
    <div class="detail__top-block">
        <h1 class="top-block__name">{{ $report->user['name'] }}</h1>
        <a class="top-block__button" href="/report/list?date={{ $report['date_at'] }}">戻る</a>
    </div>
    <p class="detail-date">{{ Carbon::parse($report['date_at'])->format('m月d日') }}</p>
    <p class="detail-content">
        {!! nl2br(htmlspecialchars($report['content'])) !!}    
    </p>
</div>
@endsection