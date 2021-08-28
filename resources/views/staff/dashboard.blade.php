@extends('layouts.app')

@section('content')
<div class="wrapper">
    @if (Auth::user()->is_admin == 4)
    <div class="iq-sidebar  sidebar-default ">
        <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('staffdashboard') }}" class="header-logo">
                <img src="{{ asset('public/assets/images/layouts/02.jpg') }}" class="img-fluid rounded-normal light-logo" alt="logo">
                <h5 class="logo-title light-logo ml-3">STOPOva</h5>
            </a>
            <div class="iq-menu-bt-sidebar ml-0">
                <i class="fa fa-bars wrapper-menu"></i>
            </div>
        </div>
        <div class="data-scrollbar" data-scroll="1">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li class="active">
                        <a href="{{ route('staffdashboard') }}" class="svg-icon">
                            <svg class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                </path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span class="ml-4">Dashboards</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('staff/pos/index') }}" class="svg-icon">
                            <svg class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                </path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span class="ml-4">POS</span>
                        </a>
                </ul>
            </nav>

            <div class="p-3"></div>
        </div>
    </div>
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                    <i class="fa fa-bars  wrapper-menu"></i>
                    <a href="{{ route('staffdashboard') }}" class="header-logo">
                        <img src="{{asset('public/assets/images/layouts/02.jpg')}}" class="img-fluid rounded-normal" alt="logo">
                        <h5 class="logo-title ml-3">STOPOva</h5>

                    </a>
                </div>
                <div class="iq-search-bar device-search">
                    <form action="#" class="searchbox">
                        <a class="search-link" href="#"><i class="fa fa-search"></i></a>
                        <input type="text" class="text search-input" placeholder="Search here...">
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav navbar-list align-items-center">
                            {{-- <li class="nav-item nav-icon dropdown">
                                <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                      <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                      <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                  </svg>
                                    <span class="bg-primary "></span>
                                </a>
                                <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="card shadow-none m-0">
                                        <div class="card-body p-0 ">
                                            <div class="cust-title p-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 class="mb-0">Notifications</h5>
                                                    <a class="badge badge-primary badge-card" href="#">3</a>
                                                </div>
                                            </div>
                                            <div class="px-3 pt-0 pb-0 sub-card">
                                                <a href="#" class="iq-sub-card">
                                                    <div class="media align-items-center cust-card py-3 border-bottom">
                                                        <div class="">
                                                            <img class="avatar-50 rounded-small" src="../public/assets/images/user/01.jpg" alt="01">
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <h6 class="mb-0">Emma Watson</h6>
                                                                <small class="text-dark"><b>12 : 47 pm</b></small>
                                                            </div>
                                                            <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                            <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#" role="button">
                                              View All
                                          </a>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="nav-item nav-icon dropdown caption-content mr-auto">
                                <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('/public/storage/users/' . Auth::user()->user_img) }}" class="img-fluid rounded "
                                        alt="user">
                                </a>
                                <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="card shadow-none m-0">
                                        <div class="card-body p-0 text-center">
                                            <div class="media-body profile-detail text-center">
                                                <img src="{{ asset('/public/assets/images/layouts/04.jpg') }}"
                                                    alt="profile-bg" class="rounded-top img-fluid mb-4">
                                                <img src="{{ asset('/public/storage/users/' . Auth::user()->user_img) }}" alt="profile-img"
                                                    class="rounded profile-img img-fluid avatar-70">
                                            </div>
                                            <div class="p-3">
                                                <h5 class="mb-1">
                                                    {{Auth::user()->name}}
                                                </h5>
                                                <p class="mb-0"></p>
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    {{-- <a href="profile"
                                                        class="btn border mr-2">Profile</a> --}}
                                                    <a href="{{ route('logout') }}" class="btn border"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Sign Out</a>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </div>

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-transparent card-block card-stretch card-height border-none">
                        <div class="card-body p-0 mt-lg-2 mt-0">
                            <h3 class="mb-3">Hi {{ Auth::user()->name }},
                                {{$greetings}}

                            </h3>
                            <p class="mb-0 mr-4">Your dashboard gives you views of key performance or business process.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">

                        <div class="col-lg-4 col-md-4">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4 card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-warning-light">
                                            <img src="{{asset('public/assets/images/product/01.png')}}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <p class="mb-2">Total Product</p>
                                            <h4>{{$numProduct}}</h4>
                                        </div>
                                    </div>
                                    <div class="iq-progress-bar mt-2">
                                        <span class="bg-info iq-progress progress-1" data-percent="85">
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4 card-total-sale">
                                            <div class="icon iq-icon-box-2 bg-success-light">
                                                <img src="{{asset('public/assets/images/product/3.png')}}" class="img-fluid" alt="image">
                                            </div>
                                            <div>
                                                <p class="mb-2">Total Order</p>
                                                <h4>{{$numOrder}}</h4>
                                            </div>
                                        </div>
                                        <div class="iq-progress-bar mt-2">
                                        <span class="bg-success iq-progress progress-1" data-percent="75">
                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card card-block card-stretch card-height">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Top Products</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled row top-product mb-0">
                                @if (!empty($items))

                                @forelse($items as $data)
                                <li class="col-lg-3 m-0">
                                    <div class="card m-0">
                                        <div class="card-body">
                                            <div class="bg-warning-light rounded">
                                                <img src="{{ asset('/public/storage/product/' . $data->product_img) }}" class="style-img img-fluid m-auto p-3 m-0" alt="image">
                                            </div>
                                            <div class="style-text text-left mt-3">
                                                <h5 class="mb-1">{{$data->name}}</h5>
                                                <p class="mb-0">{{$data->quantity}} Item</p>
                                            </div>
                                            @empty
                                            No Product Found!
                                        </div>
                                    </div>
                                </li>
                               @endforelse
                               @endif
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
            <!-- Page end  -->
        </div>
    </div>
    @else

        <div class="row pt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="pt-5 text-center">
                    <h3 class="text-danger">
                        Please Login with Staff Credentials!!!
                    </h3>
                    @if(Auth::user()->is_admin == 2)
                        <a class="btn btn-warning btn-xl" href="{{ route('managerdashboard') }}">Return</a>
                    @elseif(Auth::user()->is_admin == 3)
                        <a class="btn btn-warning btn-xl" href="{{ route('stockkeeperdashboard') }}">Return</a>
                    @elseif(Auth::user()->is_admin == 1)
                        <a class="btn btn-warning btn-xl" href="{{ route('dashboard') }}">Return</a>
                    @endif

                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    @endif

</div>


@endsection
