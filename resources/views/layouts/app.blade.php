<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Xclusive') }}</title>


        {{-- <link href="{{asset('public/msg/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/msg/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/msg/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('public/msg/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('public/msg/css/waves-effect.css')}}" rel="stylesheet">

        <!-- Plugins css -->
        <link href="{{asset('public/msg/assets/notifications/notification.css')}}" rel="stylesheet" />

        <!-- Custom Files -->
        <link href="{{asset('public/msg/css/helper.css')}}" rel="stylesheet" type="text/css" /> --}}
        <link href="{{asset('public/msg/css/style.css')}}" rel="stylesheet" type="text/css" />


        {{-- <script src="{{asset('public/msg/js/modernizr.min.js')}}"></script> --}}

        {{-- <link href="{{asset('public/msg/css/bootstrap.min.css')}}" rel="stylesheet" /> --}}

    <!-- Favicon -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="{{ asset('public/assets/images/layouts/01.jpg') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('public/assets/css/backend.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('public/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('public/assets/vendor/remixicon/fonts/remixicon.css') }}"> --}}
    @livewireStyles


</head>
<body>
    <div>
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


    {{-- <script>
        var resizefunc = [];
    </script> --}}

    <!-- jQuery  -->
    {{-- <script src="{{asset('public/msg/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/msg/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/msg/js/waves.js')}}"></script>
    <script src="{{asset('public/msg/js/wow.min.js')}}"></script>
    <script src="{{asset('public/msg/js/jquery.nicescroll.js" type="text/javascript')}}"></script>
    <script src="{{asset('public/msg/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('public/msg/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/msg/assets/jquery-detectmobile/detect.js')}}"></script>
    <script src="{{asset('public/msg/assets/fastclick/fastclick.js')}}"></script>
    <script src="{{asset('public/msg/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/msg/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

    <script src="{{asset('public/msg/assets/notifications/notify.min.js')}}"></script>
    <script src="{{asset('public/msg/assets/notifications/notify-metro.js')}}"></script>
    <script src="{{asset('public/msg/assets/notifications/notifications.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('public/msg/js/jquery.app.js')}}"></script> --}}

</body>
</html>
