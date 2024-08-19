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
    {{-- <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Verify OTP</h4>
                                <p class="text-muted mb-4">Enter OTP received on you registered phone number</p>
                            </div>

                            <form method="POST" action="{{ route('otp.validate') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="centy_plus_otp" class="form-label">Centy OTP</label>
                                    <div class="input-group">
                                        <span class="input-group-text">CNT-</span>
                                        <input id="centy_plus_otp" type="text" class="form-control @error('centy_plus_otp') is-invalid @enderror" name="centy_plus_otp" value="{{ old('centy_plus_otp') }}" required autocomplete="centy_plus_otp" autofocus>
                                        @isset($error)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit">Validate</button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div> --}}

    <section class="signup-wrapper">
        <div class="container">
            <div class="logo-signup">
                <a class="navbar-brand" href="https://edtech.skoolid.africa/">
                    <img src="{{ asset('ui/assets/images/logo/logo-skoolid.png')}}">
                </a>
            </div>
            <div class="inner-wrapper2 inner-login">
                <div class="inner-content-form">
                  <h3>OTP Verification</h3>
                  <p class="info">Pease enter the otp sent to email <strong>{{ $maskedEmail  }}</strong>
                    you registered with</p>
              
                        <form method="POST" action="{{ route('verify-otp') }}" style="box-shadow: none; padding:20px 10px;">
                            @csrf
                        <div class="form-group">
                            <input type="text" name="otp" class="form-control" id="exampleInputName" aria-describedby="name" placeholder="Enter OTP">
                        </div>
                        <button class="btn btn-primary" type="submit">Verify</button>
                      </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
@endsection
