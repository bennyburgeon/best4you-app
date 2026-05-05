@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Find Your Dream Job with <span class="text-primary">Best4You</span></h1>
                <p class="lead mb-5 text-muted">We connect top talent with industry leaders. Discover thousands of job opportunities across various industries.</p>
                <div class="d-flex gap-3">
                    <a href="/jobs" class="btn btn-primary btn-lg px-5 rounded-pill">Browse Jobs</a>
                    <a href="/upload-resume" class="btn btn-outline-secondary btn-lg px-5 rounded-pill">Upload Resume</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-center">
                <img src="https://img.freepik.com/free-vector/job-interview-concept-illustration_114360-1532.jpg" alt="Hero" class="img-fluid" width="500">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <h2 class="fw-bold text-primary">500+</h2>
                <p class="text-muted">Active Jobs</p>
            </div>
            <div class="col-md-3 mb-4">
                <h2 class="fw-bold text-primary">200+</h2>
                <p class="text-muted">Trusted Companies</p>
            </div>
            <div class="col-md-3 mb-4">
                <h2 class="fw-bold text-primary">10k+</h2>
                <p class="text-muted">Candidates</p>
            </div>
            <div class="col-md-3 mb-4">
                <h2 class="fw-bold text-primary">1k+</h2>
                <p class="text-muted">Successful Hires</p>
            </div>
        </div>
    </div>
</section>
@endsection
