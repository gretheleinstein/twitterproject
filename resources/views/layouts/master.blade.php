<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- - CSRF Token - -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- - Scripts - -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- - Title Page - -->
    <title>@yield('page_title')</title>

    <!-- - Logo - -->
    <link rel="icon" href="{{ asset('images/logo/twitter_logo.png') }}" type="image/png">

    <!-- Javascript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
    @yield('other_css')
  </head>
  <body>
    @yield('nav_bar')
    @yield('body_content')

    <script src="{{ asset('js/bootstrap/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
  </body>
</html>
