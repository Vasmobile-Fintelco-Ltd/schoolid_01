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
                <h2>Enter Phone Number</h2>
                <P class="text-center">Please enter the phone number you would like to use to complete the transaction</P> 
                @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif     
              
                    <form action="{{ route('submit_plan') }}" method="POST" style="box-shadow: none; padding:20px 10px;">
                        @csrf
                    <div class="form-group">
                        <input type="text" name="plan" value="{{ $plan }}" hidden>
                        <input type="number" name="cost" value="{{ $cost }}" hidden>
                        <input type="text" name="user_id" value="{{ $user_id }}" hidden>
                        <input type="number" name="phone_number" class="form-control" id="exampleInputName" aria-describedby="name" placeholder="Enter Phone Number">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="this.disabled = true; this.form.submit();">Pay Now</button>

                
                  </form>
            </div>
        </div>
    </div>
</section>
   


    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#payNowButton').click(function(){
                $(this).prop('disabled', true);
            });
        });
    </script>
@endsection
