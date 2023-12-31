<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This application is Admit.">
    <title>Admit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/reset.css') }}">      
    <link rel="stylesheet" href="{{ asset('css/layouts/default.css') }}">
    @yield('css')
    <script src="{{ asset('js/layouts/default.js') }}" defer></script>
    @yield('js')
</head>

<body>
    <header class="header" id="top">
        <div class="logo">
            <a class="logo-link" href="/">Admit</a>
        </div>
        <div class="right-group">
            @if (Auth::check())
            <div class="person">
                <p class="person-text">{{ Auth::user()['name'] }} 様</p>
            </div>
            @endif
            <div class="burger">
                <div class="burger-line first"></div>
                <div class="burger-line second"></div>
                <div class="burger-line third"></div>
            </div>
        </div>
    </header>

    <main class="main">
        <nav class="nav">
            <ul class="nav-list">
                @if (!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/register">新規登録</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">ログイン</a>
                </li>
                @else
                @if (Auth::user()['email'] !== 'owner@owner.com')
                <li class="nav-item">
                    <a class="nav-link" href="/attendance">勤怠管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/attendance/list/">勤怠一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/attendance/over/">時間外一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/holiday">休暇申請</a>
                </li>
                @endif
                @if (Auth::user()['email'] === 'owner@owner.com')
                <li class="nav-item">
                    <a class="nav-link" href="/holiday/list">休暇申請一覧</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/report">日報報告</a>
                </li>
                @endif
                @if (Auth::user()['email'] === 'owner@owner.com')
                <li class="nav-item">
                    <a class="nav-link" href="/report/list">日報一覧</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/mail">メール通知</a>
                </li>
                <li class="nav-item">
                    <form class="nav-item__form" action="/logout" method="post">
                    @csrf
                        <button class="nav-link logout">ログアウト</button>
                    </form>
                </li>
                @endif
            </ul>
        </nav>
        <div class="main-content">
            <div class="main-content__title">
                @yield('title')
            </div>
            @yield('content')
        </div>
    </main>

    <aside class="aside">
        <div class="comment">
            @if (session('success'))
            <p class="comment-text success">{{ session('success') }}</p>
            @elseif (session('danger'))
            <p class="comment-text danger">{{ session('danger') }}</p>
            @endif
        </div>
        <div class="mask"></div>
        <div class="upper">
            <a class="upper-link" href="#top"><</a>
        </div>
    </aside>
</body>
</html>