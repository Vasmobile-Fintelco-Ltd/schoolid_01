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
<section class="signup-wrapper2">
    <div class="container">
        <div class="logo-signup">
            <a href="#">
                <img src="{{ asset('ui/assets/images/logo/logo-skoolid.png')}}">
            </a>
        </div>
        
                <div class="pricing-header2">
                    <h1>Choose your subscription plan</h1>
                    <P>Select the Subscription plan that best suits your needs:</P>
                </div>
                <div class="row clearfix">
                    
                    <!-- Price Block -->
                    <div class="price-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="title">Weekly</div>
                            <div class="price"><sup>Kes</sup>40/Day</div>
                            <div class="date">Daily rate</div>
                            <ul class="price-options">
                                
                            </ul>
                            <div class="button-box text-center">
                                <form action="{{ route('subscribe_payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="daily_1">
                                    <input type="hidden" name="cost" value="1">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="purchase-btn theme-btn">Purchase Now</button>
                                </form>
                            </div>                            
                        </div>
                    </div>
                    
                    <!-- Price Block -->
                    <div class="price-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="title">Weekly</div>
                            <div class="price"><sup>Kes</sup>250/week</div>
                            <div class="date">save 10% with this discounted rate</div>
                            <ul class="price-options">
            
                            </ul>
                            <div class="button-box text-center">
                                <form action="{{ route('subscribe_payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="weekly_7">
                                    <input type="hidden" name="cost" value="250">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="purchase-btn theme-btn">Purchase Now</button>
                                </form>
                            </div>   
                        </div>
                    </div>
                    
                    <!-- Price Block -->
                    <div class="price-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="title">Monthly</div>
                            <div class="price"><sup>Kes</sup>999/Month</div>
                            <div class="date">save 20% with this discounted rate</div>
                            <ul class="price-options">
                                
                            </ul>
                            <div class="button-box text-center">
                                <form action="{{ route('subscribe_payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="monthly_30">
                                    <input type="hidden" name="cost" value="999">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="purchase-btn theme-btn">Purchase Now</button>
                                </form>
                            </div>   
                        </div>
                    </div>
                </div>
    
    </div>
</section>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
@endsection
