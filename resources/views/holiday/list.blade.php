@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/holiday/list.css') }}">
@endsection

@section('title', '休暇申請一覧')

@section('content')
<div class="list-section">
    <table class="list-table">
        <tr class="table-item">
            <th class="table-title">日付</th>
            <th class="table-title">時間</th>
            <th class="table-title">氏名</th>
            <th class="table-title">休暇種類</th>
            <th class="table-title"></th>
        </tr>
        @for ($i = 0; $i < 15; $i++)
        <tr class="table-item">
            <td class="table-content">1日1日</td>
            <td class="table-content">9:00～12:00</td>
            <td class="table-content">中山太郎</td>
            <td class="table-content">有給休暇</td>
            <td class="table-content">
                <form class="table-content__form" action="">
                    <button class="table-button">未承認</button>
                </form>
            </td>
        </tr>
        @endfor
    </table>
</div>
@endsection
