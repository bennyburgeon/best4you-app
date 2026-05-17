@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="fw-bold">Dashboard</h4>
        <p class="text-muted">Welcome to the Best4You Administration Panel</p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h6 class="text-muted text-uppercase mb-2">Total Jobs</h6>
                <h2 class="fw-bold text-primary mb-0">{{ $stats['jobs'] ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h6 class="text-muted text-uppercase mb-2">Applications</h6>
                <h2 class="fw-bold text-success mb-0">{{ $stats['applications'] ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h6 class="text-muted text-uppercase mb-2">Clients</h6>
                <h2 class="fw-bold text-warning mb-0">{{ $stats['clients'] ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h6 class="text-muted text-uppercase mb-2">Categories</h6>
                <h2 class="fw-bold text-info mb-0">{{ $stats['categories'] ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center p-5">
                <i class="bi bi-gear fs-1 text-muted mb-3"></i>
                <h5>Administration Panel Active</h5>
                <p class="text-muted mb-0">Use the navigation menu above to manage system resources.</p>
            </div>
        </div>
    </div>
</div>
@endsection
