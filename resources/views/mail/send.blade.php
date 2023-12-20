<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is mail.">
    <title>通知メール</title>
    <link rel="stylesheet" href="{{ asset('css/mail/send.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="header-title">通知メール</h1>
    </header>
    <main class="main">
        <h2 class="main-title">タイトル</h2>
        <p class="main-title__text">{{ $title }}</p>
        <h2 class="main-content">内容</h2>
        <p class="main-content__text">{{ $content }}</p>
    </main>
</body>
</html>