<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>

<body class="antialiased">

    @include('components.header')

    @yield('content')
   
  @include('components.footer')

  <script>
    window.onscroll = function() {myFunction()};
    
    function myFunction() {
      if (document.documentElement.scrollTop > 50) {
        document.getElementById("header").className = "onscroll";
      } else {
        document.getElementById("header").className = "";
      }
    }
    </script>

</body>

</html>
