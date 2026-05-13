@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Job Categories</h5>
        @can('create categories')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="resetForm()">
            <i class="bi bi-plus"></i> Add Category
        </button>
        @endcan
    </div>
    <div class="table-responsive text-nowrap p-3">
        {{ $dataTable->table(['class' => 'table table-hover w-100']) }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="categoryForm" action="{{ route('job-categories.store') }}" method="POST">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control" placeholder="e.g. IT & Software" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Parent Category (Optional)</label>
                            <select name="parent_category_id" id="parentCategoryId" class="form-select">
                                <option value="">None (Main Category)</option>
                                @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @endforeach
                            </select>
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
        document.getElementById('categoryForm').action = "{{ route('job-categories.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('categoryName').value = '';
        document.getElementById('parentCategoryId').value = '';
        document.getElementById('modalTitle').innerText = 'Add Category';
    }

    function editCategory(category) {
        document.getElementById('categoryForm').action = "/admin/job-categories/" + category.id;
        document.getElementById('methodField').innerHTML = '@method("PUT")';
        document.getElementById('categoryName').value = category.name;
        document.getElementById('parentCategoryId').value = category.parent_category_id || '';
        document.getElementById('modalTitle').innerText = 'Edit Category';
        
        var myModal = new bootstrap.Modal(document.getElementById('categoryModal'));
        myModal.show();
    }
</script>
@endpush
@endsection
