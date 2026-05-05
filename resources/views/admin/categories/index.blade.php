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
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Parent Category</th>
                    <th>Date Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($categories as $category)
                <tr>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td>{{ $category->parent ? $category->parent->name : 'Main Category' }}</td>
                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @can('edit categories')
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editCategory({{ $category->toJson() }})">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete categories')
                                <form action="{{ route('job-categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
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
