@extends('layouts.admin')

@section('title', 'Job Details')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $job->title }}</h5>
                <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary btn-sm">Back to Jobs</a>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3"><strong>Job Code:</strong> {{ $job->job_code ?: '-' }}</div>
                    <div class="col-md-3"><strong>Category:</strong> {{ $job->category->name ?? '-' }}</div>
                    <div class="col-md-3"><strong>Industry:</strong> {{ $job->industryType->name ?? '-' }}</div>
                    <div class="col-md-3"><strong>Location:</strong> {{ $job->location ?: '-' }}</div>
                    <div class="col-md-3"><strong>Client:</strong> {{ $job->client->title ?? '-' }}</div>
                    <div class="col-md-3"><strong>Experience:</strong> {{ $job->experience_min ?? 0 }} - {{ $job->experience_max ?? 0 }} years</div>
                    <div class="col-md-3"><strong>Salary:</strong> {{ $job->currency->symbol ?? '' }}{{ $job->salary_from ?: '-' }} to {{ $job->currency->symbol ?? '' }}{{ $job->salary_to ?: '-' }}</div>
                    <div class="col-md-3"><strong>Gender Preference:</strong> {{ $job->gender_preference ?: 'Any' }}</div>
                </div>

                <hr>

                <h6>Skills</h6>
                <div class="mb-3">
                    @forelse($job->skills as $skill)
                        <span class="badge bg-primary me-1 mb-1">{{ $skill->name }}</span>
                    @empty
                        <span class="text-muted">No skills assigned.</span>
                    @endforelse
                </div>

                <h6>Roles & Responsibilities</h6>
                <div class="border rounded p-3 bg-light">
                    {!! $job->roles_and_responsibility !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

