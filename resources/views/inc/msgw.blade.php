<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        {{-- <title>Moltran - Responsive Admin Dashboard Template</title> --}}

        <!-- Base Css Files -->
        {{-- <link href="{{asset('public/msg/css/bootstrap.min.css')}}" rel="stylesheet" /> --}}

        <!-- Font Icons -->
        <link href="{{asset('public/msg/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/msg/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/msg/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('public/msg/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="css/waves-effect.css" rel="stylesheet">

        <!-- Plugins css -->
        <link href="{{asset('public/msg/assets/notifications/notification.css')}}" rel="stylesheet" />

        <!-- Custom Files -->
        <link href="{{asset('public/msg/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/msg/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{asset('public/msg/js/modernizr.min.js')}}"></script>

    </head>
</head>
<body>
    @if(count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="waves-effect waves-light autohidebut" onclick="$.Notification.autoHideNotify('info', 'top right', 'I will be closed in 5 seconds...','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">
                {{$error}}
            </div>
            {{-- <a class="btn btn-info waves-effect waves-light autohidebut" href="javascript:;" onclick="$.Notification.autoHideNotify('info', 'top right', 'I will be closed in 5 seconds...','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Info</a>
            <a class="btn btn-success waves-effect waves-light autohidebut" href="javascript:;" onclick="$.Notification.autoHideNotify('success', 'top right', 'I will be closed in 5 seconds...','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Success</a>
            <a class="btn btn-warning waves-effect waves-light autohidebut" href="javascript:;" onclick="$.Notification.autoHideNotify('warning', 'top right', 'I will be closed in 5 seconds...','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Warning</a>
            <a class="btn btn-danger waves-effect waves-light autohidebut" href="javascript:;" onclick="$.Notification.autoHideNotify('error', 'top right', 'I will be closed in 5 seconds...','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Error</a> --}}

        </div>
    </div>

    @endforeach
    @endif

    @if (session()->has('success'))

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="waves-effect waves-light autohidebut" href="javascript:;" onclick="$.Notification.autoHideNotify('success', 'top right', 'I will be closed in 5 seconds...','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')" >
                {{session('success')}}
            </div>
        </div>
    </div>

@endif

@if (session()->has('error'))

<div class="panel panel-default">
    <div class="panel-body">
        <div class="waves-effect waves-light autohidebut" href="javascript:;" onclick="$.Notification.autoHideNotify('error', 'top right', 'I will be closed in 5 seconds...','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">
            {{session('error')}}
        </div>
    </div>
</div>


@endif

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{asset('public/msg/js/jquery.min.js')}}"></script>
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
    <script src="{{asset('public/msg/js/jquery.app.js')}}"></script>
</body>
</html>
