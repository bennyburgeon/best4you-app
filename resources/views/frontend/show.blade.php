@extends('layouts.frontend')

@section('title', $job->title)

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ url('/') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left me-1"></i> Back to Jobs
        </a>
    </div>

    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="card p-4 p-md-5 mb-4">
                <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
                    <div>
                        <span class="badge badge-soft-primary px-3 py-2 rounded-pill mb-3">{{ $job->job_code }}</span>
                        <h1 class="fw-bold mb-2">{{ $job->title }}</h1>
                        <div class="d-flex flex-wrap gap-4 text-muted mt-3">
                            @if($job->location)
                                <div class="d-flex align-items-center"><i class="bi bi-geo-alt fs-5 me-2 text-primary"></i> {{ $job->location }}</div>
                            @endif
                            @if($job->jobType)
                                <div class="d-flex align-items-center"><i class="bi bi-briefcase fs-5 me-2 text-primary"></i> {{ $job->jobType->name }}</div>
                            @endif
                            <div class="d-flex align-items-center"><i class="bi bi-clock fs-5 me-2 text-primary"></i> Posted {{ $job->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="fw-bold mb-4">Job Description</h4>
                <div class="job-description text-secondary lh-lg mb-5">
                    {!! nl2br(e($job->description ?? 'No description provided.')) !!}
                </div>
                
                @if($job->skills->count() > 0)
                    <h5 class="fw-bold mb-3">Required Skills</h5>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @foreach($job->skills as $skill)
                            <span class="badge bg-light text-secondary border px-3 py-2 fs-6 rounded-pill">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <!-- Application Form -->
            <div class="card p-4 p-md-5" id="apply-form">
                <h3 class="fw-bold mb-4">Apply for this position</h3>
                
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ url('/apply') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-lg" required value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control form-control-lg" required value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control form-control-lg" required value="{{ old('phone') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Resume/CV (PDF, DOC) <span class="text-danger">*</span></label>
                            <input type="file" name="resume" class="form-control form-control-lg" accept=".pdf,.doc,.docx" required>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Submit Application</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card p-4 mb-4 bg-light border-0 shadow-sm">
                <h5 class="fw-bold mb-4">Job Overview</h5>
                
                <ul class="list-unstyled mb-0">
                    @if($job->salary_from && $job->salary_to)
                    <li class="d-flex mb-3 align-items-center">
                        <div class="bg-white p-2 rounded text-primary me-3 shadow-sm"><i class="bi bi-cash-stack fs-5"></i></div>
                        <div>
                            <span class="d-block text-muted small fw-bold text-uppercase">Offered Salary</span>
                            <span class="fw-semibold text-dark">{{ $job->currency ? $job->currency->symbol : '$' }}{{ number_format($job->salary_from) }} - {{ number_format($job->salary_to) }}</span>
                        </div>
                    </li>
                    @endif
                    
                    @if($job->experience_min !== null)
                    <li class="d-flex mb-3 align-items-center">
                        <div class="bg-white p-2 rounded text-primary me-3 shadow-sm"><i class="bi bi-person-badge fs-5"></i></div>
                        <div>
                            <span class="d-block text-muted small fw-bold text-uppercase">Experience</span>
                            <span class="fw-semibold text-dark">{{ $job->experience_min }} - {{ $job->experience_max ?? '+' }} Years</span>
                        </div>
                    </li>
                    @endif
                    
                    @if($job->category)
                    <li class="d-flex mb-3 align-items-center">
                        <div class="bg-white p-2 rounded text-primary me-3 shadow-sm"><i class="bi bi-grid fs-5"></i></div>
                        <div>
                            <span class="d-block text-muted small fw-bold text-uppercase">Category</span>
                            <span class="fw-semibold text-dark">{{ $job->category->name }}</span>
                        </div>
                    </li>
                    @endif
                </ul>
                
                <div class="d-grid mt-4">
                    <a href="#apply-form" class="btn btn-primary btn-lg">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#applyJobModal form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var $form = $(this);
        var $btn = $form.find('button[type="submit"]');
        var originalText = $btn.text();
        
        $btn.html('<span class="spinner-border spinner-border-sm me-2"></span> Processing...').prop('disabled', true);
        
        // Remove existing alerts in modal
        $form.find('.alert').remove();
        
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'Accept': 'application/json'
            },
            success: function(response) {
                $btn.text(originalText.trim()).prop('disabled', false);
                $form.prepend('<div class="alert alert-success border-success-subtle mb-4"><i class="fa fa-check-circle me-2"></i> ' + response.message + '</div>');
                $form[0].reset();
                setTimeout(function() {
                    $('#applyJobModal').modal('hide');
                    $form.find('.alert').remove();
                }, 3000);
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
                $form.prepend(errorHtml);
            }
        });
    });
});
</script>
@endpush
