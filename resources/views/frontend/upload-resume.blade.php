@extends('layouts.frontend')

@section('title', 'Upload Resume')

@push('styles')
<style>
.breadcrumbs {
  background-image: url('/frontend/assets/img/slider.webp');
  background-size: cover;
  background-position: center;
  padding: 100px 0;
  position: relative;
  z-index: 1;
}
.breadcrumbs::after {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(26, 118, 209, 0.82);
  z-index: -1;
}

.border-dashed { border: 2px dashed #dee2e6; transition: 0.3s; }
.drop-zone:hover { border-color: #1a76d1; background-color: rgba(26, 118, 209, 0.05); }
.bg-light-soft { background-color: #fcfdfe; }
.cursor-pointer { cursor: pointer; }
.letter-spacing-1 { letter-spacing: 1px; }

form .form-control:focus {
    border-color: #1a76d1;
    box-shadow: 0 0 0 4px rgba(26, 118, 209, 0.1);
}
</style>
@endpush

@section('content')
<div class="upload-resume-page">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="text-white fw-bold fs-1">Upload Your Resume</h2>
                        <ul class="bread-list list-unstyled d-flex justify-content-center gap-2 text-white">
                            <li><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active opacity-75">Upload Resume</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Section -->
    <section class="upload-section py-5 bg-light">
        <div class="container">
            <div class="upload-container bg-white p-5 rounded-4 shadow-sm mx-auto" style="max-width: 700px;">
                <h2 class="text-center fw-bold mb-2">Join Our Talent Network</h2>
                <p class="text-center text-secondary mb-5">Submit your resume and let our experts help you find the perfect opportunity in India or abroad.</p>

                @if($errors->any())
                    <div class="alert alert-danger border-danger-subtle mb-4">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Upload Form -->
                <form action="{{ url('/apply') }}" method="POST" enctype="multipart/form-data" class="resume-form">
                    @csrf
                    <div class="row g-4">
                        <!-- Name Field -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold small text-uppercase text-secondary">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control py-3 rounded-3" placeholder="Enter your full name" required>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold small text-uppercase text-secondary">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control py-3 rounded-3" placeholder="email@example.com" required>
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold small text-uppercase text-secondary">Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control py-3 rounded-3" placeholder="10-digit number" required>
                            </div>
                        </div>

                        <!-- File Field -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold small text-uppercase text-secondary">Resume File (PDF, DOC, DOCX) <span class="text-danger">*</span></label>
                                <div class="drop-zone border-dashed p-4 rounded-3 text-center bg-light-soft position-relative">
                                    <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-5 fw-bold text-uppercase letter-spacing-1 shadow">
                                Submit Resume
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.resume-form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var $btn = $(this).find('button[type="submit"]');
        var originalText = $btn.text();
        
        $btn.html('<span class="spinner-border spinner-border-sm me-2"></span> Processing...').prop('disabled', true);
        
        // Remove existing alerts
        $('.alert-success, .alert-danger').remove();
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'Accept': 'application/json'
            },
            success: function(response) {
                $btn.text(originalText.trim()).prop('disabled', false);
                $('.resume-form').before('<div class="alert alert-success border-success-subtle mb-4"><i class="fa fa-check-circle me-2"></i> ' + response.message + '</div>');
                $('.resume-form')[0].reset();
                // Clear the drop zone text
                $('.drop-zone input[type="file"]').val('');
            },
            error: function(xhr) {
                $btn.text(originalText.trim()).prop('disabled', false);
                
                var errorHtml = '<div class="alert alert-danger border-danger-subtle mb-4"><ul class="mb-0">';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorHtml += '<li>' + value[0] + '</li>';
                    });
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorHtml += '<li>' + xhr.responseJSON.message + '</li>';
                } else {
                    errorHtml += '<li>An error occurred. Please try again.</li>';
                }
                errorHtml += '</ul></div>';
                $('.resume-form').before(errorHtml);
            }
        });
    });
});
</script>
@endpush
