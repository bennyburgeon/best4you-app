@extends('layouts.admin')

@section('title', 'Jobs')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Jobs</h5>
        @can('create jobs')
        <a href="{{ route('jobs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus"></i> Post Job
        </a>
        @endcan
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover datatable w-100">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Client</th>
                    <th>Dates</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($jobs as $job)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xs me-2">
                                <span class="avatar-initial rounded-circle bg-label-primary"><i class="bi bi-briefcase"></i></span>
                            </div>
                            <div>
                                <span class="fw-semibold d-block">{{ $job->title }}</span>
                                <small class="text-muted">{{ $job->industryType ? $job->industryType->name : 'N/A' }}</small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-label-info">{{ $job->job_code ?: 'N/A' }}</span></td>
                    <td>
                        <span class="badge bg-label-secondary">{{ $job->category ? $job->category->name : 'N/A' }}</span>
                    </td>
                    <td>{{ $job->client ? $job->client->title : 'N/A' }}</td>
                    <td>
                        <div class="d-flex flex-column">
                            <small class="text-success"><i class="bi bi-calendar-check me-1"></i> {{ $job->opening_date ? \Carbon\Carbon::parse($job->opening_date)->format('M d, Y') : 'N/A' }}</small>
                            <small class="text-danger"><i class="bi bi-calendar-x me-1"></i> {{ $job->closing_date ? \Carbon\Carbon::parse($job->closing_date)->format('M d, Y') : 'N/A' }}</small>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-inline-block">
                            <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('jobs.show', $job->id) }}">
                                    <i class="bi bi-eye me-1"></i> View
                                </a>
                                @can('edit jobs')
                                <a class="dropdown-item" href="{{ route('jobs.edit', $job->id) }}">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete jobs')
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-trash me-1"></i> Delete
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
