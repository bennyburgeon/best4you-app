<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BestForYou') | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="/frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/assets/css/nice-select.css">
    <link rel="stylesheet" href="/frontend/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/frontend/assets/css/icofont.css">
    <link rel="stylesheet" href="/frontend/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="/frontend/assets/css/owl-carousel.css">
    <link rel="stylesheet" href="/frontend/assets/css/datepicker.css">
    <link rel="stylesheet" href="/frontend/assets/css/animate.min.css">
    <link rel="stylesheet" href="/frontend/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/frontend/assets/css/normalize.css">
    <link rel="stylesheet" href="/frontend/assets/style.css">
    <link rel="stylesheet" href="/frontend/assets/css/responsive.css">
    @stack('styles')
</head>
<body>
<div class="frontend-layout">
    <header class="header">
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-5 col-12">
                        <ul class="top-link social-icons">
                            <li><a class="facebook" href="https://www.facebook.com/bestforyouhrconsultancyIndia/"><i class="icofont-facebook"></i></a></li>
                            <li><a class="instagram" href="https://www.instagram.com/bestforyouhrconsultancy_India/"><i class="icofont-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-7 col-12">
                        <ul class="top-contact">
                            <li><i class="fa fa-phone"></i>+91 7594008787</li>
                            <li><i class="fa fa-phone"></i>+91 495 2921500</li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:recruiter@best4ucareers.com">recruiter@best4ucareers.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="/frontend/assets/img/logo.jpg" alt="BestForYou"></a>
                            </div>
                            <div class="mobile-nav"></div>
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                                        <li><a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>
                                        <li><a class="{{ request()->is('services') ? 'active' : '' }}" href="{{ url('/services') }}">Services</a></li>
                                        <li><a class="{{ request()->is('jobs*') ? 'active' : '' }}" href="{{ url('/jobs') }}">Jobs</a></li>
                                        <li><a class="{{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="get-quote">
                                <a href="{{ url('/upload-resume') }}" class="btn">Upload Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>About Us</h2>
                            <p>BestForYou is a job consultancy committed to helping you find the right job. We offer personalized services to job seekers and connect them with top employers.</p>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/bestforyouhrconsultancyIndia/"><i class="icofont-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/bestforyouhrconsultancy_India/"><i class="icofont-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer f-link">
                            <h2>Quick Links</h2>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                <li><a href="{{ url('/services') }}">Services</a></li>
                                <li><a href="{{ url('/jobs') }}">Job</a></li>
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer f-link">
                            <h2>Job Seekers</h2>
                            <ul>
                                <li><a href="#">Resume Building</a></li>
                                <li><a href="#">Interview Prep</a></li>
                                <li><a href="#">Networking</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer f-link">
                            <h2>Contact Us</h2>
                            <p>1587/H, Elayambari House (Ambadi Building), Florican Road, Malaparamba, Kozhikode, Kerala 673009.</p>
                            <p>Phone: +91 7594008787,<br>+91 495 2921500</p>
                            <p>Email: recruiter@best4ucareers.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>&copy; 2025 BestForYou. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="/frontend/assets/js/jquery.min.js"></script>
<script src="/frontend/assets/js/jquery-migrate-3.0.0.js"></script>
<script src="/frontend/assets/js/jquery-ui.min.js"></script>
<script src="/frontend/assets/js/easing.js"></script>
<script src="/frontend/assets/js/colors.js"></script>
<script src="/frontend/assets/js/popper.min.js"></script>
<script src="/frontend/assets/js/bootstrap-datepicker.js"></script>
<script src="/frontend/assets/js/jquery.nav.js"></script>
<script src="/frontend/assets/js/slicknav.min.js"></script>
<script src="/frontend/assets/js/jquery.scrollUp.min.js"></script>
<script src="/frontend/assets/js/niceselect.js"></script>
<script src="/frontend/assets/js/tilt.jquery.min.js"></script>
<script src="/frontend/assets/js/owl-carousel.js"></script>
<script src="/frontend/assets/js/jquery.counterup.min.js"></script>
<script src="/frontend/assets/js/steller.js"></script>
<script src="/frontend/assets/js/wow.min.js"></script>
<script src="/frontend/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/frontend/assets/js/waypoints.min.js"></script>
<script src="/frontend/assets/js/bootstrap.min.js"></script>
<script src="/frontend/assets/js/main.js"></script>
@stack('scripts')
</body>
</html>
