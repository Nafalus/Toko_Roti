<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/d3b2ed7825.js" crossorigin="anonymous"></script>
    <style>
      #map {
        height: 500px;
        width: 100%;
        border-radius: 0.5rem;
      }
    </style>
    @include('component.style')
    @yield('css')
</head>

@yield('content')

@yield('js')

</html>
