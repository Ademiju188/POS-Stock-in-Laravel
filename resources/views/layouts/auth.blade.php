<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Xclusive') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/css/stylesheet.css')}}">
    <!-- Colors Css -->
    <link id="color-switcher" type="text/css" rel="stylesheet" href="#">
    @livewireStyles


</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        </div>
    </div>
    <!-- Preloader End -->
    <div id="app">
        @include('sweetalert::alert')


        <main class="">
            @yield('content')


        </main>

    </div>
    <script>
        window.addEventListener('contentChanged', event => {

        });
    </script>
    @livewireScripts

<!-- Script -->
<script src="{{asset('public/auth/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/auth/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Style Switcher -->
<script src="{{asset('public/auth/js/switcher.min.js')}}"></script>
<script src="{{asset('public/auth/js/theme.js')}}"></script>

</body>
</html>
