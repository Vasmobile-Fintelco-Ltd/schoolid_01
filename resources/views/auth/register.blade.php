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
                <div class="card shadow-lg">
                    <!-- Logo-->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="{{ route('register') }}">
                            <span><img src="{{ asset('assets/images/centyplus logo.png') }}" alt="" height="40"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a href="#guardian" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    Guardian
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nonstudent" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                    Non-Student
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="guardian">
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up - Guardian</h4>
                                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute.</p>
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Guardian Name</label>
                                        <input placeholder="Enter your name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" type="text">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Guardian Phone Number</label>
                                        <input id="phone_number" placeholder="Enter your phone number"  minlength="10" maxlength="10" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email Address">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Pin</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password" type="password" pattern="\d*" inputmode="numeric" minlength="4" maxlength="4" placeholder="Enter 4-digit PIN" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>4-digit Pin Required</strong>
                                            </span>
                                            @enderror
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">Confirm Pin</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password-confirm" type="password" pattern="\d*" inputmode="numeric" minlength="4" maxlength="4" placeholder="Confirm 4-digit PIN" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                            <label class="form-check-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary" type="submit"> Sign Up </button>
                                    </div>
                                </form>
                            </div> <!-- end tab-pane-->

                            <div class="tab-pane" id="nonstudent">
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up - Non-Student</h4>
                                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute.</p>
                                </div>

                                <form method="POST" action="{{ route('nonstudent') }}">
                                    @csrf

                                    <!-- Add the same fields as in the Guardian tab, with adjustments for non-student if necessary -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input placeholder="Enter your name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" type="text">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input id="phone_number" placeholder="Enter your phone number"  minlength="10" maxlength="10" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email Address">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Pin</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password" type="password" pattern="\d*" inputmode="numeric" minlength="4" maxlength="4" placeholder="Enter 4-digit PIN" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>4-digit Pin Required</strong>
                                            </span>
                                            @enderror
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">Confirm Pin</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password-confirm" type="password" pattern="\d*" inputmode="numeric" minlength="4" maxlength="4" placeholder="Confirm 4-digit PIN" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                            <label class="form-check-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary" type="submit"> Sign Up </button>
                                    </div>
                                </form>
                            </div> <!-- end tab-pane-->
                        </div> <!-- end tab-content-->
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-muted ms-1"><b>Log In</b></a></p>
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

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
        <div class="inner-wrapper">
            <div class="inner-image">
                <img src="{{ asset('ui/assets/images/backgrounds/registration-form-3.jpg')}}"/>
            </div>
            <div class="inner-content-form">
              <h2>Select User👋</h2>
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a href="#Student" role="tab" data-toggle="tab"
                     class="nav-link active">Student</a>
                </li>
                <li class="nav-item">
                  <a href="#Parent" role="tab" data-toggle="tab"
                     class="nav-link">Parent</a>
                </li>
                <li class="nav-item">
                  <a href="#Non-parent" role="tab" data-toggle="tab"
                     class="nav-link">Non-Student</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="Student">
                  <!-- <h2>Student Sign Up👋</h2> -->
                  <form method="POST" action="{{ route('signup') }}">
                    @csrf 
                    <input type="hidden" name="role" value="student">
                      <div class="form-group group1">
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailName" placeholder="Enter First Name">
                      </div>
                      <div class="form-group group2">
                          <input type="text" name="last" class="form-control" id="exampleInputName" aria-describedby="emailNmae" placeholder="Enter Last Name">
                        </div>
                      <div class="form-group group1">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email">
                      </div>
                      <div class="form-group group2">
                          <input type="number" name="phone_number" class="form-control" id="exampleInputPhone" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                          <input type="text" name="school"  class="form-control" id="exampleInputName" aria-describedby="emailName" placeholder="Enter School Name">
                        </div>
                      <div class="form-group">
                          <select class="form-control" id="exampleFormControlSelect1" name="level">
                            <option value="jrn">Juniour Secondary</option>
                            <option value="hg">High School</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <select class="form-control" id="exampleFormControlSelect1" name="grade">
                            <option value="g6">Grade 6</option>
                            <option value="g7">Grade 7</option>
                            <option value="g8">Grade 8</option>
                          </select>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                          <label class="form-check-label" for="defaultCheck1">
                            I Accept the terms of use & private policy
                          </label>
                        </div>
                        <button class="btn btn-primary" type="submit"> Sign Up </button>
                    </form>
                </div>
                <div class="tab-pane" role="tabpanel" id="Parent">
                  <!-- <h2>Parent Sign Up👋</h2> -->
                  <form method="POST" action="{{ route('signup') }}">
                    @csrf
                    <input type="hidden" name="role" value="parent">
                      <div class="form-group">
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailName" placeholder="Enter First Name">
                      </div>
                      <div class="form-group">
                          <input type="text" name="last" class="form-control" id="exampleInputName" aria-describedby="emailNmae" placeholder="Enter Last Name">
                        </div>
                      <div class="form-group">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email">
                      </div>
                      <div class="form-group">
                        <input type="number" name="phone_number" class="form-control" id="exampleInputPhone" placeholder="Enter Phone Number">
                    </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                          <label class="form-check-label" for="defaultCheck1">
                            I Accept the terms of use & private policy
                          </label>
                      </div>
                      <button class="btn btn-primary" type="submit"> Sign Up </button>
                    </form>
                </div>
                <div class="tab-pane" role="tabpanel" id="Non-parent">
                  <!-- <h4>Non-Student Sign Up👋</h2> -->
                    <form method="POST" action="{{ route('signup') }}">
                        @csrf
                        <input type="hidden" name="role" value="nonstudent">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailName" placeholder="Enter First Name">
                          </div>
                          <div class="form-group">
                              <input type="text" name="last" class="form-control" id="exampleInputName" aria-describedby="emailNmae" placeholder="Enter Last Name">
                            </div>
                          <div class="form-group">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email">
                          </div>
                          <div class="form-group">
                            <input type="number" name="phone_number" class="form-control" id="exampleInputPhone" placeholder="Enter Phone Number">
                        </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          I Accept the terms of use & private policy
                        </label>
                      </div>
                      <button class="btn btn-primary" type="submit"> Sign Up </button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   
@endsection
