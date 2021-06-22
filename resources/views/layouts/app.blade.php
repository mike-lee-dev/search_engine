<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>等級別検索サイト</title>
    <meta name="_csrf" content="{{csrf_token()}}"/>
    <meta name="keywords" content="株式会社日本スマートマーケティング">
    <meta name="description" content="株式会社日本スマートマーケティング　JSM, Limited">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/textstyles.css')}}" type="text/css">
    <link rel="icon" href="{{asset('img/icon.png')}}" type="text/css">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="https://jsm.bz/rss.xml">
{{--    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>--}}
    <script src="{{asset('template/js/vendors/jquery-3.2.1.min.js')}}"></script>
    @yield('css')
</head>
<body>
<div id="wrapper">

    <header>
        <div id="top">
            <div class="inner py-2">
                <h1></h1>
                <h2 class="title"><span><a href="{{route('home')}}" style="display: flex"><img src="{{asset('img/logo.png')}}" style="height: 65px; margin-right: 15px;"><p style="margin-top: auto; margin-bottom: auto">全省庁統一資格・調達情報・等級別検索サイト</p></a></span></h2>
            </div>
            <input type="checkbox" id="panel" value="">
            <label for="panel" id="topmenubtn">MENU</label>
            <div id="topmenubox">
                <div id="topmenubox-inner">
                    <nav id="topmenu">
{{--                        <ul>--}}
{{--                            <li><a href="">ホーム</a></li>--}}
{{--                            <li><a href="">検索</a></li>--}}
{{--                            <li><a href="">プロファイル</a></li>--}}
{{--                            <li><a href="">お問い合わせ</a></li>--}}
{{--                        </ul>--}}
                    </nav>
                    @if(\Illuminate\Support\Facades\Auth::guard()->check())
                        <div id="topsubmenu">
{{--                            <span><a href="{{route('home')}}">ホーム</a></span>--}}
                            <span><a href="{{route('mail-setting')}}">メール受信設定</a></span>
                            <span><a href="{{route('profile')}}">プロファイル</a></span>
                            <span>
                                <a href="{{url('/logout')}}">ログアウト</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </span>
                        </div>
                    @else
                        <div id="topsubmenu">
                            <span><a href="{{url('/login')}}">ログイン</a></span>
                            <span><a href="{{url('/register')}}">登録</a></span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
{{--        <div id="headerbox">--}}
{{--            --}}{{--            <div id="header"><img src="{{asset('img/header.jpg')}}" alt="調達情報の検索画面"></div>--}}
{{--        </div>--}}
    </header>
    @yield('content')
    <input type="hidden" id="home_path" value="<?=url('');?>">
</div>

<div id="pagetop"><a>トップへ戻る</a></div>
<footer id="footer">

    <div class="inner">
        <p style="text-align:right;letter-spacing: 0;">│　<a href="https://search.chotatu.info/operation_guide.pdf" style="color: #333" target="_blank">操作ガイド</a>　│　<a href="{{route('specific-trans')}}" style="color: #333">特定商取引</a>　│　<a href="https://search.chotatu.info/contact/contact.html" style="color: #333" target="_blank">お問い合わせ</a>　│</p>
{{--        <div class="desc">調達情報の検索画面の作成について</div>--}}
        <small style="color: #333">Copyright © 2021 株式会社日本スマートマーケティング
            All Rights Reserved.
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script type="text/javascript" async="" src="{{asset('js/analytics.js.download')}}"></script>
            <script async="" src="{{asset('js/js')}}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }

                gtag('js', new Date());

                gtag('config', 'UA-166045948-1');
            </script>
        </small>

    </div>

</footer>
<script>
    $("#pagetop").click(function() {
        window.scrollTo(0, 0);
    });
</script>

@yield('js')
</body>
</html>
