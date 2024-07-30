<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{asset('css/master.css') }}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css') }}">
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
</head>
<body>
    <main class="@yield('classMain')">
        @yield('content')
    </main>
    <script src="{{ asset ('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset ('js/owl.carousel.min.js') }}"></script>
    @yield('js')
</body>
</html>

