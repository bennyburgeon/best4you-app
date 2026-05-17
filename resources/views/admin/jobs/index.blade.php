@extends('layouts.admin')

@section('title', 'Jobs')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center border-bottom-0 pb-0">
        <div>
            <h5 class="card-title mb-1 fw-bold">Live Vacancies</h5>
            <small class="text-muted">Management of active job listings</small>
        </div>
        <a href="{{ route('jobs.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Post New Job
        </a>
    </div>
    
    <div class="card-body mt-4">
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="table-responsive text-nowrap rounded-3 border">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Code</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Title</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Company</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Industry</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Dates</th>
                        <th class="text-uppercase text-center" style="font-size: 0.75rem; width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($items as $item)
                    <tr>
                        <td><span class="badge bg-label-primary">{{ $item->job_code ?? 'N/A' }}</span></td>
                        <td class="fw-medium">{{ $item->title }}</td>
                        <td>{{ $item->client ? $item->client->title : $item->company }}</td>
                        <td>{{ $item->industryType ? $item->industryType->name : '-' }}</td>
                        <td>
                            <div class="small">
                                <div class="text-success"><i class="bx bx-calendar-check me-1"></i>{{ $item->opening_date ?? 'N/A' }}</div>
                                <div class="text-danger"><i class="bx bx-calendar-x me-1"></i>{{ $item->closing_date ?? 'N/A' }}</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('jobs.edit', $item->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <form action="{{ route('jobs.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bx bx-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No jobs found. Click "Post New Job" to create one.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
