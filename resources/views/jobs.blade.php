@extends('layouts.app')

@section('title', 'Browse Jobs')

@section('content')
<section class="py-5 bg-white border-bottom">
    <div class="container text-center">
        <h1 class="fw-bold mb-3">Browse Jobs</h1>
        <p class="text-muted">Find the perfect opportunity that matches your skills and experience.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Filters</h5>
                        <form action="/jobs" method="GET">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Category</label>
                                @foreach($categories as $cat)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="category" value="{{ $cat->id }}" id="cat_{{ $cat->id }}" {{ request('category') == $cat->id ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label" for="cat_{{ $cat->id }}">
                                        {{ $cat->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <a href="/jobs" class="btn btn-outline-secondary btn-sm w-100">Clear Filters</a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Job List -->
            <div class="col-lg-9">
                @forelse($jobs as $job)
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="fw-bold mb-1">{{ $job->title }}</h5>
                                <div class="d-flex flex-wrap gap-3 text-muted small">
                                    <span><i class="bi bi-building me-1"></i> {{ $job->client ? $job->client->title : 'Company Confidential' }}</span>
                                    <span><i class="bi bi-geo-alt me-1"></i> Remote / India</span>
                                    <span><i class="bi bi-briefcase me-1"></i> {{ $job->category->name }}</span>
                                </div>
                            </div>
                            <span class="badge bg-label-primary p-2">New</span>
                        </div>
                        <p class="text-muted mb-4" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {!! strip_tags($job->roles_and_responsibility) !!}
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="fw-bold text-primary">{{ $job->currency ? $job->currency->symbol : '' }} {{ number_format($job->salary_from) }} - {{ number_format($job->salary_to) }}</span>
                            <a href="/jobs/{{ $job->id }}" class="btn btn-primary px-4 rounded-pill">Apply Now</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5">
                    <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-5369.jpg" alt="No jobs" class="img-fluid mb-3" width="200">
                    <p class="text-muted lead">No jobs found matching your criteria.</p>
                </div>
                @endforelse

                <div class="d-flex justify-content-center mt-4">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .bg-label-primary { background-color: #e7e7ff !important; color: #696cff !important; }
</style>
@endsection
