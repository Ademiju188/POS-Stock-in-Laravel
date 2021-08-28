@extends('layouts.app')
@section('content')
<div class="wrapper">
    @if(Auth::user()->is_admin == 2)
        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="{{ route('managerdashboard') }}" class="header-logo">
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
                            <a href="{{ route('managerdashboard') }}" class="svg-icon">
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
                            <a href="{{ url('manager/pos/index') }}" class="svg-icon">
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
                                    <a href="{{url('manager/product/create')}}">
                                        <i class="fa fa-minus"></i><span>Add Product</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="{{url('manager/product/index')}}">
                                        <i class="fa fa-minus"></i><span>Manage Product</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{url('manager/product/manage-product')}}">
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
                                    <a href="{{url('manager/stock/create')}}">
                                        <i class="fa fa-minus"></i><span>Add Stock</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{url('manager/stock/index')}}">
                                        <i class="fa fa-minus"></i><span>Manage Stock</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{url('manager/stock/outofstock')}}">
                                        <i class="fa fa-minus"></i><span>Out of Stock </span>
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
                                    <a href="{{url('manager/category/stock-category')}}">
                                        <i class="fa fa-minus"></i><span>Manage Stock Category</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{url('manager/category/product-category')}}">
                                        <i class="fa fa-minus"></i><span>Manage Product Category</span>
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
            <div class="card">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Product List</h4>
                            </div>
                        <a href="{{url('manager/product/create')}}" class="btn btn-primary add-list"><i
                            class="fa fa-plus mr-3"></i>Add Product</a>
                        </div>
                        <p class="mb-0"></p>
                    </div>
                    <div class="col-lg-12">
                        <br>
                        {{-- @include('inc.msg') --}}
                        <div class="card-body">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info table-bordered text-center">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="light light-data">
                                            <th>S/N</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Price(#)</th>
                                            <th>Quantity</th>
                                            <th>Last Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody class="light-body">
                                    @foreach ($products as $key => $product)
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('/public/storage/product/' . $product->product_img) }}"
                                                            class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                        <div>
                                                            {{ $product->product_name }}
                                                            <p class="mb-0"><small></small></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a class="badge badge-info text-center" data-toggle="modal" data-placement="top"
                                                        title="" data-original-title="View" data-target="#view{{ $product->id }}"
                                                        href="#"><i class="fa fa-eye mr-0"></i> View</a>
                                                </td>

                                                <td>
                                                    @if (empty($product->category->name))
                                                        No Category Selected
                                                    @else
                                                        {{ $product->category->name }}
                                                    @endif
                                                </td>
                                                <td>
                                                @if (empty($product->price))
                                                Undefined
                                                @else
                                                {{ number_format($product->price), 2 }}</td>
                                                @endif
                                                <td>
                                                    @if ($product->quantity <= 20)
                                                        <span class="badge badge-danger">Low Quantity = {{ $product->quantity }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-success">{{ $product->quantity }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$product->lastUpdatedDate}} <br>
                                                    <span class="font-italic">{{$product->lastUpdatedTime}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center list-action">

                                                        <a class="badge bg-success mr-2" data-toggle="modal" data-placement="top"
                                                            title="Update Product" data-original-title="Edit"
                                                            data-target="#editproduct{{ $product->id }}" href="#"><i
                                                                class="fa fa-edit mr-0"></i></a>
                                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-placement="top"
                                                            title="Delete Product" data-original-title="Delete"
                                                            data-target="#DModal{{ $product->id }}" href="#"><i
                                                                class="fa fa-trash mr-0"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                    @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>

        @foreach ($products as $product)
            <!-- Modal Edit -->
            <div class="modal fade bd-example-modal-lg" id="editproduct{{ $product->id }}" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="popup text-left">
                                <div class="media align-items-top justify-content-between">
                                    <h3 class="">Update product</h3>
                                    <div class="btn-cancel p-0" data-dismiss="modal"><i class="fa fa-times"></i></div>
                                </div>
                                <div class="content edit-notes">
                                    <div class="card card-transparent card-block card-stretch event-note mb-0">
                                        <div class="card-body px-0 bukmark">
                                            <div
                                                class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                                <div class="quill-tool">
                                                </div>
                                            </div>
                                            <div id="quill-toolbar1">
                                                <form action="{{ route('product.update', $product->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Name *</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Product Name" name="product_name"
                                                                    data-errors="Please Product Name."
                                                                    value="{{ $product->product_name }}" required="">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Category *</label>

                                                                <select class="selectpicker form-control" name="category_id"
                                                                    id="category_id" data-style="py-0" required>
                                                                    <option value="">Select Category Type</option>
                                                                    @if (empty($product->category->id))
                                                                    @else
                                                                        <option value="{{ $product->category_id }}"
                                                                            {{ $product->category->id == $product->category_id ? 'selected' : '' }}>
                                                                            {{ $product->category->name }}
                                                                        </option>

                                                                    @endif
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Price *</label>
                                                                <input type="number" name="price"
                                                                    value="{{ $product->price }}"
                                                                    class="form-control" placeholder="Enter Product Price"
                                                                    data-errors="Please Enter Product Price.">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Quantity *</label>
                                                                <input type="number" name="quantity"
                                                                    value="{{ $product->quantity }}" class="form-control"
                                                                    placeholder="Enter Product Quantity"
                                                                    data-errors="Please Enter Product Quantity." required="">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Product Image</label>
                                                                <input type="file" class="form-control image-file"
                                                                    name="product_img" accept="image/*">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Description / Product Details</label>
                                                                <textarea class="form-control" name="description"
                                                                    rows="4">{{ $product->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center card-footer border-0">
                                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- <div class="card-footer border-0"> --}}
                                            {{-- <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                        <div class="btn btn-primary mr-3" data-dismiss="modal">Cancel</div>
                                        <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                    </div> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($products as $product)

            <!-- Modal Edit -->
            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal fade" id="DModal{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="popup text-left">
                                    <h4 class="mb-3">Deleting...</h4>
                                    <hr>
                                    <div class="content create-workform bg-body">
                                        <div class="pb-3 text-center">
                                            <p class="text-danger">DELETE PRODUCT</p>

                                            <h2>{{ $product->product_name }}?</h2>
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach

        @foreach ($products as $product)

            <!-- Modal Edit -->
            <div class="modal fade" id="view{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="popup text-left">
                                <div class="media align-items-top justify-content-between">
                                    <h3 class="mb-1">Description</h3>
                                    <div class="btn-cancel p-0" data-dismiss="modal"><i class="fa fa-times"></i></div>
                                </div>
                                <div class="content edit-notes">
                                    <div class="card card-transparent card-block card-stretch event-note mb-0">
                                        <div class="card-body px-0 bukmark">
                                            <div
                                                class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                                <div class="quill-tool">
                                                </div>
                                            </div>
                                            <div id="quill-toolbar1">


                                                @if (empty($product->description))
                                                    Undefined
                                                @else
                                                    {{ $product->description }}
                                                @endif

                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-footer border-0">
                                            <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                                <div class="btn btn-primary mr-3" data-dismiss="modal">Close</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    @else
        <div class="row pt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="pt-5 text-center">
                    <h3 class="text-danger">
                        Please Login with Manager Credentials!!!
                    </h3>
                    @if(Auth::user()->is_admin == 1)
                        <a class="btn btn-warning btn-xl" href="{{ route('dashboard') }}">Return</a>
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

@endsection
