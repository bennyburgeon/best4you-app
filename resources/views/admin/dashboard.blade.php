@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-primary p-2"><i class="bi bi-briefcase text-primary fs-4"></i></span>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Jobs</span>
                <h3 class="card-title mb-2">{{ $stats['jobs'] }}</h3>
                <small class="text-success fw-semibold"><i class="bi bi-arrow-up-short"></i> Active listings</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-success p-2"><i class="bi bi-file-earmark-person text-success fs-4"></i></span>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Applications</span>
                <h3 class="card-title mb-2">{{ $stats['applications'] }}</h3>
                <small class="text-success fw-semibold"><i class="bi bi-arrow-up-short"></i> New candidates</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-info p-2"><i class="bi bi-building text-info fs-4"></i></span>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Clients</span>
                <h3 class="card-title mb-2">{{ $stats['clients'] }}</h3>
                <small class="text-muted">Registered partners</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-warning p-2"><i class="bi bi-tags text-warning fs-4"></i></span>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Categories</span>
                <h3 class="card-title mb-2">{{ $stats['categories'] }}</h3>
                <small class="text-muted">Job classifications</small>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Welcome Card -->
    <div class="col-md-12 col-lg-8 mb-4">
        <div class="card h-100">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Welcome back, {{ auth()->user()->name }}! 🎉</h5>
                        <p class="mb-4">
                            You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in your profile.
                        </p>
                        <a href="{{ url('/admin/jobs') }}" class="btn btn-sm btn-outline-primary">View Jobs</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-label-primary { background-color: #e7e7ff !important; color: #696cff !important; }
    .bg-label-success { background-color: #e8fadf !important; color: #71dd37 !important; }
    .bg-label-info { background-color: #d7f5fc !important; color: #03c3ec !important; }
    .bg-label-warning { background-color: #fff2d6 !important; color: #ffab00 !important; }
    .avatar-initial {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.375rem;
    }
</style>
@endpush
