<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('ui/assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/font-awesome-pro.css') }}">

    <title>Examind</title>
</head>

<body>
    <header class="site_header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('ui/assets/images/logo/skoolid-logo.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                        <span class="d-block">Examind is an exam preparation tool that uses <span
                                class="variation"><u>AI to predict exam questions.</u></span></span>
                    </h1>
                    <p class="wow fadeInUp" data-wow-delay=".2s">
                        Pay KES 40.00 Daily to revise and play brain game to win KES 1,000.00 Daily.
                    </p>
                    <form class="search-form">
                        <div class="input-group">
                            <div class="input-group3 mx-auto d-block" >
                               
                                <a class="rstore-domain-search-button search-submit btn btn-info"
                                    href="{{ route('register') }}">Sign Up</a>
                                <a class="rstore-domain-search-button search-submit btn btn-primary"
                                    href="{{ route('login') }}">Sign In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="work-details">
        <div class="container">
            <div class="work-wrapper">
                <div class="img-work">
                    <img src="{{ asset('ui/assets/images/backgrounds/registration-form-1.jpg') }}">
                </div>
                <div class="work-content">
                    <h2>How Examind Works</h2>
                    <p>
                        Examind is a revolutionary platform designed to help students revise effectively for their
                        exams.
                        It comes preloaded with previous KCSE past papers and leverages machine learning to analyze
                        examiners'
                        patterns in setting exams. This allows Examind to predict potential questions that may appear in
                        the
                        national exam, giving students a strategic advantage.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="Personalized-Learning" style="background-image: url({{ asset('ui/assets/images/backgrounds/') }})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="personalized-header">
                    <h2>Personalized Learning</h2>
                    <p>
                        With the Examind platform integrated into Skoolid, students benefit from a tailored learning
                        experience designed to enhance their exam preparation. Here’s how it works:
                    </p>
                </div>
                <div class="personalized-wrapper">
                    <div class="personalized-content">
                        <div class="personailzed-icon">
                            <!-- <i class="fa-solid fa-bullseye"></i> -->
                        </div>
                        <div class="step">step 01</div>
                        <h2>Targeted Revision</h2>
                        <p>
                            Students use past exam papers to practice and revise. The platform’s advanced algorithms
                            analyze their performance to identify strengths and weaknesses.
                        </p>
                    </div>
                    <div class="personalized-content">
                        <div class="personailzed-icon">
                            <!-- <i class="fa-regular fa-comments"></i> -->
                        </div>
                        <div class="step">step 02</div>
                        <h2>Customized Feedback</h2>
                        <p>
                            Based on this analysis, Examind generates personalized predicted questions focused on the
                            areas where students need the most improvement.
                        </p>
                    </div>
                    <div class="personalized-content">
                        <div class="personailzed-icon">
                            <!-- <i class="fa-solid fa-arrows-down-to-people"></i> -->
                        </div>
                        <div class="step">step 03</div>
                        <h2>Focused Preparation</h2>
                        <p>
                            This targeted approach ensures that students are not only practicing but are doing so in a
                            way that maximizes their chances of success by addressing their specific needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->
    <section class="work-details2">
        <div class="container">
            <div class="work-wrapper">
                <div class="work-content">
                    <h2>What Is Brain Game?</h2>
                    <p>
                        Brain Game is an engaging Skoolid feature that offers a variety of challenging puzzles. You can
                        play daily puzzles and quizzes to test your knowledge and quick thinking.
                    </p>
                    <p>
                        Participate in a Brain Game for a chance to win KES 1,000 daily and compete for a grand prize of
                        KES 10,000. It’s a fun and rewarding way to challenge yourself
                    </p>
                    <a class="btn btn-primary" href="{{ route('register') }}" style="margin-top: 12px;">Play Now</a>

                </div>
                <div class="img-work">
                    <img src="{{ asset('ui/assets/images/backgrounds/hero-banner.png') }}">
                </div>
            </div>
        </div>
    </section>

    <!-- quizzess Section -->
    <section class="quizzess-section">
        <div class="container">
            <div class="quiz-content justify-content-center">
                <h2>Brain Game Quizzes</h2>

                <div class="row clearfix">
                    <!-- quizzes Block -->
                    <div class="quizzes-block col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <img src="{{ asset('ui/assets/images/backgrounds/focus.png') }}"
                                    style="width:10%;margin-top: -12px;">
                                <h4>Purpose </h4>
                            </div>
                            <div class="text">These quizzes are designed to challenge and entertain users by testing
                                their general knowledge and cognitive skills. They consist of a variety of puzzles and
                                questions that require quick thinking and problem-solving abilities.
                            </div>
                        </div>
                    </div>

                    <!-- quizzes Block -->
                    <div class="quizzes-block col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <img src="{{ asset('ui/assets/images/backgrounds/trophy.png') }}"
                                    style="width:10%;margin-top: -12px;">
                                <h4>Rewards</h4>
                            </div>
                            <div class="text">
                                Participants have the opportunity to win KES 1,000 daily and compete for a grand prize
                                of KES 10,000. The quizzes are a fun way to engage users and offer financial incentives
                                for participation.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <section class="quizzess-section">
        <div class="container">
            <div class="quiz-content justify-content-center">
                <h2>Examind Quizzes</h2>
            </div>
            <div class="row clearfix">
                <!-- quizzes Block -->
                <div class="quizzes-block col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <img src="{{ asset('ui/assets/images/backgrounds/flag.png') }}"
                                style="width:10%;margin-top: -12px;">
                            <h4>Focused Exam Preparation</h4>
                        </div>
                        <div class="text">
                            Examind Quizzes are designed to help students prepare effectively for their school exams.
                            Based on past exam papers, these quizzes target the specific topics and question types that
                            students are likely to face, ensuring their revision is both relevant and comprehensive.
                        </div>
                    </div>
                </div>

                <!-- quizzes Block -->
                <div class="quizzes-block col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <img src="{{ asset('ui/assets/images/backgrounds/chat (2).png') }}"
                                style="width:10%;margin-top: -12px;">
                            <h4>Earn Rewards</h4>
                        </div>
                        <div class="text">
                            Students can also earn rewards through these quizzes. When they meet the score targets set
                            by their parents, they receive Centy’s Coins, which are held in escrow. These coins can be
                            moved to their Centy wallet and cashed out later.
                        </div>
                    </div>
                </div>

                <!-- quizzes Block -->
                <div class="quizzes-block col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <img src="{{ asset('ui/assets/images/backgrounds/flag.png') }}"
                                style="width:10%;margin-top: -12px;">
                            <h4>Personalized Feedback</h4>
                        </div>
                        <div class="text">
                            After completing a quiz, students get personalized feedback. Examind reviews their results
                            and offers insights on where they can improve, making their study time more effective and
                            increasing their chances of success.
                        </div>
                    </div>
                </div>

                <!-- quizzes Block -->

            </div>
        </div>
    </section>
    <!-- End quizzess Section -->
    <section class="exam-work">
        <div class="container">
            <div class="exam-wrapper">
                <div class="exam-img">
                    <img src="{{ asset('ui/assets/images/backgrounds/registration-form-2.jpg') }}">
                </div>
                <div class="exam-content">
                    <h2>Unlock Your Academic Potential with Exam Prediction</h2>
                    <p>
                        Examind’s Exam Prediction feature is designed to give students a strategic advantage in their
                        exam preparation. By leveraging advanced machine learning algorithms, Exam Prediction analyzes
                        past exam papers and examiner patterns to forecast the types of questions likely to appear in
                        your upcoming exams.
                    </p>
                    <p><img src="{{ asset('ui/assets/images/backgrounds/checked.png') }}"
                            style="width:20px; margin-right: 10px;">Data-Driven Insights</p>
                    <p><img src="{{ asset('ui/assets/images/backgrounds/checked.png') }}"
                            style="width:20px; margin-right: 10px;">Personalized Predictions</p>
                    <p><img src="{{ asset('ui/assets/images/backgrounds/checked.png') }}"
                            style="width:20px; margin-right: 10px;">Efficient Revision</p>
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

                                <img src="{{ asset('ui/assets/images/logo/logo-skoolid.png') }}" alt="logo"
                                    style="width:60%;">
                            </a>
                            <p>Unlock your full potential with Examind, an AI tool designed to predict your exam results
                                based on your study habits and performance trends.</p>
                            <ul class="social-links">
                                <li><a href="https://www.facebook.com/profile.php?id=61564420642716&mibextid=ZbWKwL"
                                        target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/invites/contact/?igsh=1kfp2x7audkb5&utm_content=vletz1s"
                                        target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="https://www.tiktok.com/@skoolid?_t=8pHFLcuPoV4&_r=1" target="_blank"><i
                                            class="fa-brands fa-tiktok"></i></a></li>
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
                                <p>Join over <span>68,000</span> people getting our emails all over the world</p>
                                <form class="newsletter-form" data-toggle="validator">
                                    <label><i class='bx bx-envelope-open'></i></label>
                                    <input type="text" class="input-newsletter"
                                        placeholder="Enter your email address" name="EMAIL" required
                                        autocomplete="off">
                                    <button type="submit" class="default-btn"><i class='bx bx-paper-plane'></i>
                                        Subscribe Now</button>
                                    <div id="validator-newsletter" class="form-result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pr-line"></div>
            <div class="footer-bottom-area">
                <p>© Copyright 2024 | <a href="#" target="_blank">Examind</a> | All Rights Reserved is Proudly
                </p>
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

</body>

</html>
