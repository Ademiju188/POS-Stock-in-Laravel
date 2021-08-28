@extends('layouts.auth')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@section('content')


<div id="main-wrapper" class="oxyy-login-register">
    <div class="hero-wrap d-flex align-items-center h-100">
      <div class="hero-mask opacity-8 bg-dark"></div>
      <div class="hero-bg hero-bg-scroll" style="background-image:url({{asset('public/assets/images/layouts/bg-4.jpg')}});"></div>
      <div class="hero-content w-100 h-100">
        <div class="container">
          <div class="row no-gutters min-vh-100">
            <div class="col-lg-11 col-xl-9 mx-auto">
              <div class="row no-gutters min-vh-100">
                <!-- Welcome Text
                ========================= -->
                <div class="col-md-6">
                  <div class="hero-wrap d-flex align-items-center h-100">
                    <div class="hero-mask opacity-7 "></div>
                    <div class="hero-bg hero-bg-scroll" style="background-image:url({{asset('public/assets/images/layouts/01.jpg')}});"></div>
                    <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
                      <div class="row no-gutters">
                        <div class="col-10 col-lg-9 mx-auto">

                        </div>
                      </div>
                      <div class="row no-gutters my-auto">
                        <div class="col-10 col-lg-9 mx-auto">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Welcome Text End -->
                <!-- Login Form
                ========================= -->
                <div class="col-md-6 d-flex flex-column bg-light shadow-lg">
                  <div class="container my-auto py-5">
                    <div class="row no-gutters">
                      <div class="col-11 col-lg-10 mx-auto">
                        <h3 class="text-6 font-weight-600">Log In</h3>
                            <form method="POST" class="form-border" action="{{ route('login') }}">
                                @csrf
                          <div class="form-group icon-group icon-group-right">
                            <input type="text" class="form-control border-dark" name="username" id="emailAddress" required="" placeholder="Email or Username">
                            <span class="icon-inside"><i class="fas fa-envelope"></i></span> </div>
                          <div class="form-group icon-group icon-group-right">
                            <input type="password" name="password"  class="form-control border-dark" id="loginPassword" required="" placeholder="Password">
                            <span class="icon-inside"><i class="fas fa-lock"></i></span> </div>
                          <div class="form-check custom-control custom-checkbox mt-4">
                            <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
                            <label class="custom-control-label rounded-0" for="remember-me">Remember Me</label>
                          </div>
                          <div class="form-group">
                            <button class="btn btn-primary rounded-0 my-4" type="submit">Log In</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="container pt-2 pb-3">
                    <div class="row">
                      <div class="col-11 col-lg-10 mx-auto">
                        <p class="text-2 text-muted mb-0">XCLUSIVE © 2021 - {{date('Y')}}.</span> <a href="#" class="">All right reserved</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Login Form End -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
