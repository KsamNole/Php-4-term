<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Social Paradise</title>
    <link rel="shortcut icon" href="/imgs/logo.jpg">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<header>
    <ul class="containers-header">
        <img src="imgs/logo.jpg" style="width: 20px; height: 20px; padding-left: 5px;">
        <div class="header-btns-main">
            <a href="{{ route('home') }}">Главная</a>
            <a href="">Профиль</a>
        </div>
        <div class="header-btns-log">
            <a href="{{ route('auth.signup') }}">Зарегистрироваться</a>
            <a href="">Выйти</a>
        </div>
    </ul>
</header>
<main>
    <div class="containers-main">
        <div class="container-img"></div>
        <div class="container-main borders-left-right">
            <div class="logo-text">
                <pre>
        ╬═══╬ ╬═══╬ ╬════ ══╬══ ╔════╗ ║      ╬═══╬ ╔════╗ ╬═══╗ ╔════╗ ╬═╗ ══╬══ ╬═══╬ ╔═══╬
    ║     ║   ║ ║       ║   ║    ║ ║      ║   ║ ║    ║ ║   ║ ║    ║ ║ ╚╗  ║   ║     ║
        ╬═══╬ ║   ║ ║       ║   ╬════╬ ║      ╬═══╬ ╬════╬ ╬══╬╝ ╬════╬ ║  ║  ║   ╬═══╬ ╬═══╬
        ║ ║   ║ ║       ║   ║    ║ ║      ║     ║    ║ ║  ║  ║    ║ ║ ╔╝  ║       ║ ║
        ╬═══╬ ╬═══╬ ╬════ ══╬══ ║    ║ ╚═══╬  ╬     ║    ║ ║  ╬═ ║    ║ ╬═╝ ══╬══ ╬═══╬ ╚═══╬
                </pre>
            </div>
            @yield('main')
        </div>
        <div class="container-img"></div>
    </div>
</main>

</body>
</html>
