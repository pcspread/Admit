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
    @yield('js')
</head>

<body>
    <header class="header">
        <div class="logo">
            <a class="logo-link" href="/">Admit</a>
        </div>
    </header>

    <main class="main">
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a class="nav-link" href="/register">新規登録</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">ログイン</a>
                </li>
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
    </aside>
</body>
</html>