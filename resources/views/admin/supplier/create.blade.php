@extends('layouts.app')
@section('content')
<div class="wrapper">
@if (Auth::user()->is_admin == 1)
    <div class="iq-sidebar  sidebar-default ">
        <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="header-logo">
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
                    <li class="">
                        <a href="{{ route('dashboard') }}" class="svg-icon">
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
                        <a href="{{ url('admin/pos/index') }}" class="svg-icon">
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
                    </li>
                    <li class=" ">
                        <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                          </svg>
                            <span class="ml-4">Products</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                          </svg>
                        </a>
                        <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="{{url('admin/product/create')}}">
                                    <i class="fa fa-minus"></i><span>Add Product</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('admin/product/index')}}">
                                    <i class="fa fa-minus"></i><span>Manage Product</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('admin/product/manage-product')}}">
                                    <i class="fa fa-minus"></i><span>Out of Product</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="#stock" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="ml-4">Stock</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="stock" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="{{url('admin/stock/create')}}">
                                    <i class="fa fa-minus"></i><span>Add Stock</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('admin/stock/index')}}">
                                    <i class="fa fa-minus"></i><span>Manage Stock</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('admin/stock/outofstock')}}">
                                    <i class="fa fa-minus"></i><span>Out of Stock </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="#storekeeper" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash9" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect>
                            </svg>
                            <span class="ml-4">Store Keeper</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="storekeeper" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="{{url('admin/storekeeper/index')}}">
                                    <i class="fa fa-minus"></i><span>Manage Store</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="#category" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                            <span class="ml-4">Categories</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="{{url('admin/category/stock-category')}}">
                                    <i class="fa fa-minus"></i><span>Manage Stock Category</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('admin/category/product-category')}}">
                                    <i class="fa fa-minus"></i><span>Manage Product Category</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="#sale" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                          </svg>
                            <span class="ml-4">Sales Report</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                          </svg>
                        </a>
                        <ul id="sale" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="{{url('admin/report/daily')}}">
                                    <i class="fa fa-minus"></i><span>Daily Sale Report</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('admin/report/monthly')}}">
                                    <i class="fa fa-minus"></i><span>Monthly Sale Report</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="#people" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="ml-4">Users</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="people" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="{{url('admin/user/create')}}">
                                    <i class="fa fa-minus"></i><span>Add User</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('admin/user/index')}}">
                                    <i class="fa fa-minus"></i><span>Manage User</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="#supplier" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                            </svg>
                            <span class="ml-4">Suppliers</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="supplier" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="active">
                                <a href="{{url('admin/supplier/create')}}">
                                    <i class="fa fa-minus"></i><span>Add Supplier</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('admin/supplier/index')}}">
                                    <i class="fa fa-minus"></i><span>Manage Supplier</span>
                                </a>
                            </li>
                        </ul>
                    </li>
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
                    <a href="{{ route('dashboard') }}" class="header-logo">
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
                                                <img src="{{ asset('public/assets/images/layouts/04.jpg') }}"
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
        <div class="container-fluid add-form-list">
           <div class="row">
               <div class="col-sm-12">
                   <div class="card">
                       <div class="card-header d-flex justify-content-between">
                           <div class="header-title">
                               <h4 class="card-title">Add Supplier</h4>
                           </div>
                       </div>
                       <br>
                       @include('inc.msg')
                       <div class="card-body">
                           <form action="{{route('supplier.store')}}" method="POST"  data-toggle="validator"  enctype="multipart/form-data">
                            @csrf
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Name *</label>
                                           <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" value="{{old('name')}}" required="">
                                           <div class="help-block with-errors"></div>
                                           @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Email *</label>
                                           <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"  name="email" value="{{old('email')}}" required="">
                                           <div class="help-block with-errors"></div>
                                           @error('email')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Phone Number *</label>
                                           <input type="number" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Phone Number" name="mobile" value="{{old('mobile')}}" required="">
                                           <div class="help-block with-errors"></div>
                                           @error('mobile')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Address</label>
                                           <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" rows="0"></input>
                                       </div>
                                       <div class="help-block with-errors"></div>
                                       @error('address')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                        <label>Status *</label>
                                        <select class="selectpicker form-control" name="status" data-style="py-0" required>
                                            <option value="">Select Status Type</option>
                                            <option value="1" {{old('status') == "1" ? 'selected' : ''}}>Active</option>
                                            <option value="2" {{old('status') == "2" ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                       </div>
                                           <div class="help-block with-errors"></div>

                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Supplier Image *</label>
                                           <input type="file"
                                                    class="form-control image-file border-start-0 @error('supplier_img') is-invalid @enderror"
                                                    name="supplier_img" placeholder="Choose Image" />
                                                @error('supplier_img')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                           <div class="help-block with-errors"></div>
                                       </div>
                                   </div>

                               </div>
                               <div class="text-center pt-5">
                                   <button type="submit" class="btn btn-primary mr-2">Add Supplier</button>
                                   <button type="reset" class="btn btn-danger">Reset</button>
                                </div>

                           </form>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Page end  -->
        </div>
       @else
         <div class="row pt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="pt-5 text-center">
                    <h3 class="text-danger">
                        Please Login with Admin Credentials!!!
                    </h3>
                    @if(Auth::user()->is_admin == 2)
                        <a class="btn btn-warning btn-xl" href="{{ route('managerdashboard') }}">Return</a>
                    @elseif(Auth::user()->is_admin == 3)
                        <a class="btn btn-warning btn-xl" href="{{ route('stockkeeperdashboard') }}">Return</a>
                    @elseif(Auth::user()->is_admin == 4)
                        <a class="btn btn-warning btn-xl" href="{{ route('staffdashboard') }}">Return</a>
                    @endif

                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        @endif

    </div>

</div>
@endsection
