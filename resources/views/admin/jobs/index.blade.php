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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Client</th>
                    <th>Dates</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($jobs as $job)
                <tr>
                    <td>
                        <strong>{{ $job->title }}</strong><br>
                        <small class="text-muted">{{ $job->industryType ? $job->industryType->name : '' }}</small>
                    </td>
                    <td><span class="badge bg-label-info">{{ $job->job_code ?: 'N/A' }}</span></td>
                    <td>{{ $job->category ? $job->category->name : 'N/A' }}</td>
                    <td>{{ $job->client ? $job->client->title : 'N/A' }}</td>
                    <td>
                        <small>
                            Open: {{ $job->opening_date ? \Carbon\Carbon::parse($job->opening_date)->format('d/m/Y') : 'N/A' }}<br>
                            Close: {{ $job->closing_date ? \Carbon\Carbon::parse($job->closing_date)->format('d/m/Y') : 'N/A' }}
                        </small>
                    </td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('jobs.show', $job->id) }}">
                                    <i class="bi bi-eye me-1"></i> View
                                </a>
                                @can('edit jobs')
                                <a class="dropdown-item" href="{{ route('jobs.edit', $job->id) }}">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete jobs')
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
</div>

<style>
    .bg-label-info { background-color: #d7f5fc !important; color: #03c3ec !important; }
</style>
@endsection
