@extends('layouts.admin')

@section('title', 'Industry Types')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Industry Types</h5>
        @can('create industry-types')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#industryTypeModal" onclick="resetForm()">
            <i class="bi bi-plus"></i> Add Industry Type
        </button>
        @endcan
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Industry Type Name</th>
                    <th>Date Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($industryTypes as $type)
                <tr>
                    <td><strong>{{ $type->name }}</strong></td>
                    <td>{{ $type->created_at->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @can('edit industry-types')
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editIndustryType({{ $type->toJson() }})">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete industry-types')
                                <form action="{{ route('industry-types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this industry type?')">
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

<!-- Modal -->
<div class="modal fade" id="industryTypeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Industry Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="industryTypeForm" action="{{ route('industry-types.store') }}" method="POST">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Industry Type Name</label>
                            <input type="text" name="name" id="industryTypeName" class="form-control" placeholder="e.g. Technology" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function resetForm() {
        document.getElementById('industryTypeForm').action = "{{ route('industry-types.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('industryTypeName').value = '';
        document.getElementById('modalTitle').innerText = 'Add Industry Type';
    }

    function editIndustryType(type) {
        document.getElementById('industryTypeForm').action = "/admin/industry-types/" + type.id;
        document.getElementById('methodField').innerHTML = '@method("PUT")';
        document.getElementById('industryTypeName').value = type.name;
        document.getElementById('modalTitle').innerText = 'Edit Industry Type';
        
        var myModal = new bootstrap.Modal(document.getElementById('industryTypeModal'));
        myModal.show();
    }
</script>
@endpush
@endsection
