@extends('layouts.app')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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

<div class="wrapper">
    <section class="login-content">
       <div class="container">
          <div class="row align-items-center justify-content-center height-self-center">
             <div class="col-lg-8">
                <div class="card auth-card">
                   <div class="card-body p-0">
                      <div class="d-flex align-items-center auth-content">
                         <div class="col-lg-7 align-self-center">
                            <div class="p-3">
                               <h2 class="mb-2">Sign Up</h2>
                               <p>Create your POSDash account.</p>
                               {{-- @include('inc.msg') --}}
                               <form method="POST" action="{{ route('register') }}">
                                 @csrf
                                  <div class="row">
                                     <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                           <input class="floating-input form-control  @error('name') is-invalid @enderror" type="text" placeholder=" " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                           <label>{{ __('Name') }}</label>
                                          </div>
                                          @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                         @enderror
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                           <input class="floating-input form-control  @error('username') is-invalid @enderror" type="text" placeholder=" " name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                           <label>{{ __('Username') }}</label>
                                          </div>
                                          @error('username')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                         @enderror
                                     </div>
                                     <div class="col-lg-6">
                                       <div class="floating-label form-group">
                                          <input class="floating-input form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" type="email" placeholder=" ">
                                          <label>{{ __('E-Mail Address') }}</label>
                                       </div>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="col-lg-6">
                                       <div class="floating-label form-group">
                                          <input class="floating-input form-control  @error('mobile') is-invalid @enderror" required autocomplete="mobile" name="mobile"  type="number" placeholder=" " value="{{ old('mobile') }}">
                                          <label>{{__('Phone No.')}}</label>
                                       </div>
                                       @error('mobile')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                    </div>

                                     <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                           <input class="floating-input form-control  @error('address') is-invalid @enderror" name="address" required autocomplete="address" type="text" placeholder=" " value="{{ old('address') }}">
                                           <label>{{__('Address')}}</label>
                                          </div>
                                          @error('address')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                           <input class="floating-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" type="password" placeholder=" ">
                                           <label>Password</label>
                                          </div>
                                          @error('password')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                           <input class="floating-input form-control" type="password"
                                           name="confirm_password" required autocomplete="new-password"
                                           placeholder=" ">
                                           <label>{{ __('Confirm Password') }}</label>
                                        </div>
                                     </div>

                                  </div>
                                  <button type="submit" class="btn btn-primary"> {{ __('Register') }}</button>
                                  <p class="mt-3">
                                     Already have an Account <a href="{{route('login')}}" class="text-primary">Sign In</a>
                                  </p>
                               </form>
                            </div>
                         </div>
                         <div class="col-lg-5 content-right">
                            <img src="{{asset('public/assets/images/login/01.jpg')}}" class="img-fluid image-right" alt="">
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
@endsection
