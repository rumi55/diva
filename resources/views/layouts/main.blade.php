<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('seo_title')</title>
    <meta name="description" content="@yield('seo_description')" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('img/favicons/favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('img/favicons/apple-touch-icon-57x57.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('img/favicons/apple-touch-icon-114x114.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('img/favicons/apple-touch-icon-72x72.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('img/favicons/apple-touch-icon-144x144.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('img/favicons/apple-touch-icon-60x60.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('img/favicons/apple-touch-icon-120x120.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('img/favicons/apple-touch-icon-76x76.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('img/favicons/apple-touch-icon-152x152.png')}}" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-196x196.png')}}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-16x16.png')}}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-128.png')}}" sizes="128x128" />



</head>

<body class="preload">

    @include('components.header')

    @yield('content')

    @include('components.footer')


    <script defer src="{{ asset('js/app.js') }}"></script>
</body>

</html>
