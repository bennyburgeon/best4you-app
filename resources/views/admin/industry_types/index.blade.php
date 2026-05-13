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
    <div class="table-responsive text-nowrap p-3">
        {{ $dataTable->table(['class' => 'table table-hover w-100']) }}
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
{{ $dataTable->scripts() }}
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
