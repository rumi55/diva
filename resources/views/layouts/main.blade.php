<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('seo_title')</title>
    <meta name="description" content="@yield('seo_description')" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>

<body class="preload">

    @include('components.header')

    @yield('content')

    @include('components.footer')


    <script defer src="{{ asset('js/app.js') }}"></script>
</body>

</html>
