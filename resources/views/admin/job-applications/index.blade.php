@extends('layouts.admin')

@section('title', 'Job Applications')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center border-bottom-0 pb-0">
        <div>
            <h5 class="card-title mb-1 fw-bold">Job Applications</h5>
            <small class="text-muted">Review submitted resumes and candidate details</small>
        </div>
    </div>
    
    <div class="card-body mt-4">
        <!-- Filters -->
        <form action="{{ route('job-applications.index') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" class="form-control" name="search" placeholder="Search by name, email, phone" value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="job_id" placeholder="Job ID filter" value="{{ request('job_id') }}">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="category_id" placeholder="Category ID filter" value="{{ request('category_id') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bx bx-search"></i> Filter</button>
            </div>
        </form>

        <div class="table-responsive text-nowrap rounded-3 border">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Applicant</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Contact</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Job Applied For</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Resume</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Applied At</th>
                        <th class="text-uppercase text-center" style="font-size: 0.75rem; width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($items as $item)
                    <tr>
                        <td>
                            <div class="fw-medium text-dark">{{ $item->name }}</div>
                            <small class="text-muted">ID: {{ $item->id }}</small>
                        </td>
                        <td>
                            <div class="small">
                                <div class="text-muted"><i class="bx bx-envelope me-1"></i>{{ $item->email }}</div>
                                <div class="text-muted"><i class="bx bx-phone me-1"></i>{{ $item->phone }}</div>
                            </div>
                        </td>
                        <td>
                            @if($item->job)
                                <div class="fw-medium">{{ $item->job->title }}</div>
                                <small class="badge bg-label-primary">{{ $item->job->job_code }}</small>
                            @else
                                <span class="badge bg-label-secondary">General Application (Resume Upload)</span>
                            @endif
                        </td>
                        <td>
                            @if($item->getFirstMediaUrl('resume'))
                                <a href="{{ $item->getFirstMediaUrl('resume') }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bx bx-download me-1"></i> Download
                                </a>
                            @else
                                <span class="text-muted small">No resume attached</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $item->created_at->format('M d, Y') }}</small>
                            <div class="small text-muted">{{ $item->created_at->format('h:i A') }}</div>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('job-applications.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-danger" title="Delete">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">No applications found matching the criteria.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
