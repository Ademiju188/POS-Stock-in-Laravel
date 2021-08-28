@extends('layouts.app')
@section('content')

    <div class="wrapper">
        <div class="row p-5">
            <div class="col-lg-12"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img width="50%" src="{{ asset('storage/users/' . Auth::user()->user_img) }}" class="img-fluid rounded"
                             alt="user">
                        <h6 class="text-secondary">{{Auth::user()->name}} Already Logged In!</h6>
                        <a href="{{ route('logout') }}" class="btn border btn-danger"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}"
                              method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
