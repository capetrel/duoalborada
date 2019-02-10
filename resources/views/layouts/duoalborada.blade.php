<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Duo de guitare classique espagnole en région centre, le Duo Alborada." />
    <meta name="keywords" content="Duo, Alborada, guitare, classique, espagnole, festival, musique, guitare, voyage guitare,animation musique, projet pedagogique, region centre, centre, indre et loire, 37,tours, Festival Voyage au Centre de la Guitare," />
    <meta name="robot" content="index, follow, all"/>
    <meta name="author" content="capetrel" />
    <meta name="Identifier-URL" content="http://www.duoalborada.com" />
    <meta name="Copyright" content="@ capetrel" />

    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicons/favicon.png') }}" type="image/png">
    <link rel="icon" sizes="32x32" href="{{ asset('img/favicons/favicon-32.png') }}" type="image/png">
    <link rel="icon" sizes="64x64" href="{{ asset('img/favicons/favicon-64.png') }}" type="image/png">
    <link rel="icon" sizes="96x96" href="{{ asset('img/favicons/favicon-96.png') }}" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicons/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicons/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicons/apple-touch-icon-144x144.png') }}">
    <link rel="icon" sizes="196x196" href="{{ asset('img/favicons/favicon-196.png') }}" type="image/png">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicons/favicon-144.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <link rel="stylesheet" href="{{ asset('css/duoalborada.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/OverlayScrollbars.min.css') }}">
    @stack('css')

    @foreach($head_title as $title)
        <title> {{ $title->head_title }}</title>
    @endforeach

</head>
<body>

<div class="wrapper">

    <nav>

        @include('blocks.leftnav')

    </nav>

    <article id="main">

        <header>

            @include('blocks.header')

        </header>

        <div class="custom-content" id="custom-scroll">
            @yield('content')
        </div>

    </article>

</div>

@include('blocks.footer')

</body>
</html>
