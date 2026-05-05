@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-primary p-2">
                            <i class="bi bi-briefcase fs-4"></i>
                        </span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ $stats['jobs'] }}</h4>
                </div>
                <p class="mb-1">Total Jobs</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-success p-2">
                            <i class="bi bi-file-earmark-text fs-4"></i>
                        </span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ $stats['applications'] }}</h4>
                </div>
                <p class="mb-1">Applications</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-info p-2">
                            <i class="bi bi-building fs-4"></i>
                        </span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ $stats['clients'] }}</h4>
                </div>
                <p class="mb-1">Clients</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-warning p-2">
                            <i class="bi bi-list-ul fs-4"></i>
                        </span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ $stats['categories'] }}</h4>
                </div>
                <p class="mb-1">Categories</p>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-label-primary { background-color: #e7e7ff !important; color: #696cff !important; }
    .bg-label-success { background-color: #e8fadf !important; color: #71dd37 !important; }
    .bg-label-info { background-color: #d7f5fc !important; color: #03c3ec !important; }
    .bg-label-warning { background-color: #fff2d6 !important; color: #ffab00 !important; }
    .avatar-initial { display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; }
</style>
@endsection
