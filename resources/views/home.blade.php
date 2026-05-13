@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="slider" style="z-index:999">
    <div class="hero-slider">
        <div class="single-slider" style="background-image:url('/frontend/assets/img/slider.webp')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>Best <span>Job Consultancy </span> in India<span> Find Your Dream Job</span> with Confidence</h1>
                            <p>We connect skilled job seekers with trusted employers in India and abroad - helping you build a successful career.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider" style="background-image:url('/frontend/assets/img/slider2.webp')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>Best <span>Job Consultancy </span> in India<span> Find Your Dream Job</span> with Confidence</h1>
                            <p>We connect skilled job seekers with trusted employers in India and abroad - helping you build a successful career.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider" style="background-image:url('/frontend/assets/img/slider3.webp')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>Best <span>Job Consultancy </span> in India<span> Find Your Dream Job</span> with Confidence</h1>
                            <p>We connect skilled job seekers with trusted employers in India and abroad - helping you build a successful career.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="global-search-overlay w-100" style="position:absolute;top:70%;left:0;transform:translateY(-50%);z-index:100;pointer-events:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-9" style="pointer-events:auto;">
                    <div class="search-container shadow-lg bg-white" style="border-radius:50px;padding:6px 6px 6px 20px;">
                        <form action="{{ route('public.jobs') }}" method="GET" class="row g-0 align-items-center m-0">
                            <div class="col-md-5 border-end">
                                <div class="input-group align-items-center">
                                    <i class="fa fa-search text-muted fs-5"></i>
                                    <input type="text" name="search" class="form-control border-0 shadow-none py-3 fs-6" placeholder="Job title, skills, or company" style="background:transparent;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group align-items-center ms-3">
                                    <i class="fa fa-map-marker text-muted fs-5"></i>
                                    <input type="text" name="location" class="form-control border-0 shadow-none py-3 fs-6" placeholder="Location (e.g. Dubai, India)" style="background:transparent;">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100 fw-bold" style="border-radius:40px;padding:14px 0;font-size:16px;">Search Jobs</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="schedule">
    <div class="container">
        <div class="schedule-inner">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-schedule first">
                        <div class="inner">
                            <div class="icon"><i class="fa fa-file-text"></i></div>
                            <div class="single-content">
                                <span>Career Assistance</span>
                                <h4>Resume & Profile Building</h4>
                                <p>We help job seekers create professional resumes and optimize profiles to stand out.</p>
                                <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-schedule middle">
                        <div class="inner">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="single-content">
                                <span>Expert Guidance</span>
                                <h4>Career Counseling</h4>
                                <p>Get one-on-one sessions with our career experts to define a successful path.</p>
                                <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="single-schedule last">
                        <div class="inner">
                            <div class="icon"><i class="fa fa-clock-o"></i></div>
                            <div class="single-content">
                                <span>Visit Us</span>
                                <h4>Working Hours</h4>
                                <ul class="time-sidual">
                                    <li class="day">Monday - Friday <span>9:00 AM - 6:00 PM</span></li>
                                    <li class="day">Saturday <span>10:00 AM - 4:00 PM</span></li>
                                    <li class="day">Sunday <span>Closed</span></li>
                                </ul>
                                <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
