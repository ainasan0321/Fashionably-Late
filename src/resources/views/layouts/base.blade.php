<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fashionably-Late</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
@yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            <nav class="nav">
                <ul class="header__nav">
                @if (request()->is('login'))
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="/register">register</a>
                    </li>
                @elseif (request()->is('register'))
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="/login">login</a>
                    </li>
                @endif

                @if (Auth::check() &&
                    !request()->is('login') &&
                    !request()->is('register')
                )
                    <li class="header__nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="header__nav-button">logout</button>
                        </form>
                    </li>
                @endif
                </ul>
            </nav>
        </div>
    </header>

<main>@yield('content')</main>
</body>

</html>