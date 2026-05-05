@extends('layouts.admin')

@section('title', 'Job Applications')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Job Applications</h5>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Applicant</th>
                    <th>Job Title</th>
                    <th>Contact Info</th>
                    <th>Applied Date</th>
                    <th class="text-end">Resume</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($applications as $application)
                <tr>
                    <td><strong>{{ $application->name }}</strong></td>
                    <td>
                        {{ $application->job ? $application->job->title : 'N/A' }}<br>
                        <small class="text-muted">{{ $application->job && $application->job->category ? $application->job->category->name : '' }}</small>
                    </td>
                    <td>
                        <small>
                            <i class="bi bi-envelope"></i> {{ $application->email }}<br>
                            <i class="bi bi-telephone"></i> {{ $application->phone }}
                        </small>
                    </td>
                    <td>{{ $application->created_at->format('d/m/Y') }}</td>
                    <td class="text-end">
                        @if($application->getFirstMediaUrl('resume'))
                            <a href="{{ $application->getFirstMediaUrl('resume') }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> View Resume
                            </a>
                        @else
                            <span class="text-muted small">No Resume</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
