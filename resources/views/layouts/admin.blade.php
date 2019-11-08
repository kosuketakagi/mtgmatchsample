<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/js.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


{{--    twitterカード--}}
    <meta name="twitter:card" content="summary" /> <!--①-->
    <meta name="twitter:site" content="@Sugarless" /> <!--②-->
    <meta property="og:url" content="https://mtgmatch.sugarlessmtg.com/home" /> <!--③-->
    <meta property="og:title" content="MTG Match" /> <!--④-->
    <meta property="og:description" content="Magic:The Gatheringの対戦相手を探すことが出来るサイトです。マジックをもっと身近に楽しもう!" /> <!--⑤-->
    <meta property="og:image" content="{{ asset('images/ddg-29-heroes-reunion.jpg')}}" /> <!--⑥-->


    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
</head>


<body>

@if (session('flash_message'))
    <div class="flash_message">
        {{ session('flash_message') }}
    </div>
@endif

    <header>
        <div id="nav-drawer">
            <input id="nav-input" type="checkbox" class="nav-unshown">
            <label id="nav-open" for="nav-input"><span></span></label>
            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
            <div id="nav-content">
                <ul>
                    <li class="han-list"><a href="/admin/recruit/create">対戦相手を募集する</a></li>
                    <li class="han-list"><a href="/index">募集を探す</a></li>
                    <li class="han-list"><a href="/admin/recruit/request">リクエスト一覧</a></li>
                    <li class="han-list"><a href="/admin/recruit/mypage">My募集ページ</a></li>
                    <li class="han-list"><a href="/about">使い方</a></li>
                    <li class="han-list"><a href="/info">利用規約</a></li>
{{--                    <li class="han-list"><a href="https://sugarlessmtg.com/">なぜこのサイトを作ろうと思ったのか(外部サイト)</a></li>--}}
                    <li class="han-list"><a href="https://sugarlessmtg.com/page-858">お問い合わせ(外部サイト)</a></li>

                    @guest
                        <li class="han-list">
                            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                        </li>
                    @else

                        <li class="han-list">
                            <form action="{{ route('logout') }}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" value="　ログアウト" />
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    <div class="logo">
        <a href="/home" class="logo"><img src="{{ asset('images/logo.png') }}" class="logo" alt="logo"></a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>


    <footer>
        <a class="footer-text">© MTG Match by @sugarlessMTG</a>
    </footer>

</body>
{{--</html>--}}
