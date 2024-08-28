@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('ui/assets/css/font-awesome-pro.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('ui/assets/css/styles.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari:wght@100..800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('ui/assets/css/font-awesome-pro.css')}}">

<section class="signup-wrapper">
    <div class="container">
        <div class="logo-signup">
            <a href="http://examind.skoolid.africa/">
                <img src="{{ asset('ui/assets/images/logo/logo-skoolid.png')}}">
            </a>
        </div>
        <div class="inner-wrapper2 inner-login">
            <div class="inner-content-form">
                <h2>Sign In👋</h2>
                <form style="box-shadow: none; padding:20px 10px;" method="POST" action="{{ route('user_login') }}">
                    @csrf
                    <div class="form-group">
                      {{-- <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="email" placeholder="Enter Email Address"> --}}
                      <input id="email" type="text" placeholder="Enter Your email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                       @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {{-- <input type="pin" class="form-control" id="exampleInputPin" aria-describedby="emailPin" placeholder="Enter Pin"> --}}
                        <input id="password" type="password" pattern="\d*" inputmode="numeric" minlength="4" maxlength="4" placeholder="Enter 4-digit PIN" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <p>Dont have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot your password?</small></a>
                     @endif
                  </form>
            </div>
        </div>
    </div>
</section>

    {{-- <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5 shadow-lg">
                    <div class="card ">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your Centy Plus ID or Email to Login</p>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="centy_plus_id" class="form-label">Centy Plus ID or Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text">CNT-</span>
                                        <input id="centy_plus_id" type="text" class="form-control @error('centy_plus_id') is-invalid @enderror" name="centy_plus_id" value="{{ old('centy_plus_id') }}" required autocomplete="centy_plus_id" autofocus>
                                        @error('centy_plus_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot your password?</small></a>
                                    @endif
                                    <label for="password" class="form-label">Pin</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password" type="password" pattern="\d*" inputmode="numeric" minlength="4" maxlength="4" placeholder="Enter 4-digit PIN" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-muted ms-1"><b>Sign Up</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div> --}}
@endsection
