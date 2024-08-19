<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/font-awesome-pro.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('ui/assets/css/styles.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/font-awesome-pro.css')}}">
   
    <title>Examind</title>
  </head>
  <body>
    <header class="site_header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('ui/assets/images/logo/logo-skoolid.png')}}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Exam Prediction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Brain Game</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">quizzes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-hero my-2 my-sm-0" type="submit" href="contacts.html">Contact Us</a>
                    <a href="{{ route('login') }}" class="login-user"><i class="fa-regular fa-user"></i></a>
                </form>

                </div>
            </div>    
        </nav>
    </header>    
    
     <!-- Banner Section - Start
        ================================================== -->
        <section class="hero_banner text-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="hero-container">
                    <h1 class="wow fadeInUp" data-wow-delay=".1s">
                        <span class="focus_text">🏆 Access Affordable Quality Education</span>
                        <span class="d-block">Examind is an exam preparation tool that uses <span class="variation"><u>AI to predict exam questions.</u></span></span>
                    </h1>
                    <p class="wow fadeInUp" data-wow-delay=".2s">
                        Pay KES 40.00 Daily to revise and play brain game to win KES 1,000.00 Daily.
                    </p>
                    <form class="search-form">
                        <div class="input-group">
                            <div class="input-group3">
                                <input type="search" class="search-field" placeholder="Enter Phone Number" value="">
                                <a class="rstore-domain-search-button search-submit btn btn-info" href="{{ route('register') }}">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </section>    
         <!-- Start EduMim Footer Area -->
         <footer class="edu-footer-area">
            <div class="container">
                <div class="footer-top-area ptb-100">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <a href="index.html" class="logo">
                                 
                                    <img src="{{ asset('ui/assets/images/logo/logo-skoolid.png')}}" alt="logo" style="width:60%;">
                                </a>
                                <p>Unlock your full potential with Examind, an AI tool designed to predict your exam results based on your study habits and performance trends.</p>
                                <ul class="social-links">
                                    <li><a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget pl-5">
                                <h3>Quick Links</h3>
                                <ul class="links-list">
                                    <li><a href="how-it-works.html">How It Works</a></li>
                                    <li><a href="exam-prediction.html">Exam Prediction</a></li>
                                    <li><a href="brain-game.html">Brain Game</a></li>
                                    <li><a href="quizzes.html">Quizzes</a></li>
                                    <li><a href="pricing,html.html">Pricing</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h3>Legal</h3>
                                <ul class="links-list">
                                    <li><a href="#">Legal</a></li>
                                    <li><a href="#">Tearms of Use</a></li>
                                    <li><a href="#">Tearm & Condition</a></li>
                                    <li><a href="#">Payment Method</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h3>Newsletter</h3>
                                <div class="footer-newsletter-info">
                                        <p>Join over <span>68,000</span> people getting our emails all over the world</p>                                    <form class="newsletter-form" data-toggle="validator">
                                        <label><i class='bx bx-envelope-open'></i></label>
                                        <input type="text" class="input-newsletter" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
                                        <button type="submit" class="default-btn"><i class='bx bx-paper-plane'></i> Subscribe Now</button>
                                        <div id="validator-newsletter" class="form-result"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pr-line"></div>
                <div class="footer-bottom-area">
                    <p>© Copyright 2024 | <a href="#" target="_blank">Examind</a>  | All Rights Reserved is Proudly </p>
                </div>
            </div>
        </footer>
        <!-- End EduMim Footer Area -->

    <!-- Optional JavaScript; choose one of the two! -->

    <script>
        const navbar = document.querySelector('.navbar')

        window.addEventListener('scroll', () => {
        if (window.scrollY > 75) {
            navbar.classList.add('scrolled')
        } else {
            navbar.classList.remove('scrolled')
        }
        })
      </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
  </body>
</html>