<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Xclusive') }}</title>

    <!-- Favicon -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="{{ asset('public/assets/images/layouts/01.jpg') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/remixicon/fonts/remixicon.css') }}">
    @livewireStyles


</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        @include('sweetalert::alert')
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>

        <main class="">
            @yield('content')

            <footer class="">
                <div class="container-fluid">
                    <div class="text-center">
                        <span class="">XCLUSIVE © 2021 - {{date('Y')}}.</span> <a href="#" class="">All right reserved</a>.
                    </div>
                </div>
            </footer>
        </main>

    </div>
    <script>
        window.addEventListener('contentChanged', event => {

        });
    </script>
    @livewireScripts
    @yield('script')
    <script>

        //Report printing Section
        function ReceiptContent(el) {
            var data = '';
            data += document.getElementById(el).innerHTML
            Receipt = window.open("", "myWin", "left=450, top=130, width=400, height=500");
            Receipt.screnX = 0;
            Receipt.screnY = 0;
            Receipt.document.write(data);
            Receipt.document.title = ""
            Receipt.focus();
            setTimeout(() => {
                Receipt.close();
            }, 80000);
        }

    </script>
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('public/assets/js/backend-bundle.min.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('public/assets/js/table-treeview.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('public/assets/js/customizer.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script async="" src="{{ asset('public/assets/js/chart-custom.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('public/assets/js/app.js') }}"></script>


</body>
</html>
