@extends('layouts.admin')

@section('title', 'Job Applications')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Job Applications</h5>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover datatable w-100">
            <thead>
                <tr>
                    <th>Applicant</th>
                    <th>Job Applied</th>
                    <th>Contact Info</th>
                    <th>Applied Date</th>
                    <th class="text-center">Resume</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($applications as $application)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xs me-2">
                                <span class="avatar-initial rounded-circle bg-label-success"><i class="bi bi-person"></i></span>
                            </div>
                            <span class="fw-semibold">{{ $application->name }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="fw-medium d-block">{{ $application->job ? $application->job->title : 'N/A' }}</span>
                        <small class="text-muted">{{ $application->job && $application->job->category ? $application->job->category->name : '' }}</small>
                    </td>
                    <td>
                        <small class="d-block text-muted">
                            <i class="bi bi-envelope me-1"></i> {{ $application->email }}
                        </small>
                        <small class="d-block text-muted">
                            <i class="bi bi-telephone me-1"></i> {{ $application->phone }}
                        </small>
                    </td>
                    <td>
                        <span class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $application->created_at->format('M d, Y') }}</span>
                    </td>
                    <td class="text-center">
                        @if($application->getFirstMediaUrl('resume'))
                            <a href="{{ $application->getFirstMediaUrl('resume') }}" class="btn btn-sm btn-label-primary" target="_blank">
                                <i class="bi bi-file-earmark-pdf me-1"></i> Resume
                            </a>
                        @else
                            <span class="badge bg-label-secondary">No Resume</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
