@extends('layouts.app')

@section('title', 'Upload Resume')

@section('content')
<section class="py-5 bg-white border-bottom">
    <div class="container text-center">
        <h1 class="fw-bold mb-3">Submit Your Resume</h1>
        <p class="text-muted">Let us help you find the right opportunity. Upload your CV and we'll get in touch.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('job-applications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="+1234567890" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Upload Resume (PDF, DOC, DOCX)</label>
                                <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                                <small class="text-muted">Max file size: 10MB</small>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold">Submit Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
