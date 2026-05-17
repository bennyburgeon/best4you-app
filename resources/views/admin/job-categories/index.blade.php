@extends('layouts.admin')

@section('title', 'Job Categories')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center border-bottom-0 pb-0">
        <div>
            <h5 class="card-title mb-1 fw-bold">Job Categories</h5>
            <small class="text-muted">Manage your hierarchical job clusters</small>
        </div>
        <button type="button" class="btn btn-primary" onclick="openDialog()">
            <i class="bx bx-plus me-1"></i> Add Category
        </button>
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
                        <th class="text-uppercase" style="font-size: 0.75rem;">ID</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Name</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Symbol</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Parent</th>
                        <th class="text-uppercase text-center" style="font-size: 0.75rem; width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($items as $item)
                    <tr>
                        <td><span class="fw-medium">#{{ $item->id }}</span></td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if($item->symbol)
                                <span class="badge bg-label-primary">{{ $item->symbol }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->parent ? $item->parent->name : '-' }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-sm btn-info text-white" 
                                    onclick="openDialog({{ $item->id }}, '{{ addslashes($item->name) }}', '{{ addslashes($item->symbol ?? '') }}', '{{ $item->parent_category_id ?? '' }}')">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </button>
                                <form action="{{ route('job-categories.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
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
                        <td colspan="5" class="text-center py-4 text-muted">No categories found. Click "Add Category" to create one.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom pb-3">
                <h5 class="modal-title fw-bold" id="modalTitle">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="categoryForm" action="" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-body pt-4">
                    <div class="row">
                        <div class="col-12 col-md-8 mb-3">
                            <label class="form-label text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;" for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="e.g., Information Technology" required />
                        </div>
                        
                        <div class="col-12 col-md-4 mb-3">
                            <label class="form-label text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;" for="symbol">Symbol</label>
                            <input type="text" class="form-control" id="symbol" name="symbol" placeholder="e.g., IT" />
                        </div>
                        
                        <div class="col-12 mb-2">
                            <label class="form-label text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;" for="parent_category_id">Parent Category (Optional)</label>
                            <select class="form-select" id="parent_category_id" name="parent_category_id">
                                <option value="">None (Top Level)</option>
                                @foreach($items as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top pt-3">
                    <button type="button" class="btn btn-label-secondary" style="background-color: #f5f5f9; color: #697a8d;" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openDialog(id = null, name = '', symbol = '', parent_id = '') {
        var myModal = new bootstrap.Modal(document.getElementById('categoryModal'));
        var form = document.getElementById('categoryForm');
        
        document.getElementById('name').value = name;
        document.getElementById('symbol').value = symbol || '';
        document.getElementById('parent_category_id').value = parent_id || '';
        
        if (id) {
            document.getElementById('modalTitle').innerText = 'Edit Category';
            document.getElementById('formMethod').value = 'PUT';
            form.action = '/admin/job-categories/' + id;
        } else {
            document.getElementById('modalTitle').innerText = 'New Category';
            document.getElementById('formMethod').value = 'POST';
            form.action = '/admin/job-categories';
        }
        
        // Hide self from parent options if editing
        var options = document.getElementById('parent_category_id').options;
        for (var i = 0; i < options.length; i++) {
            if (options[i].value == id && id !== null) {
                options[i].style.display = 'none';
            } else {
                options[i].style.display = '';
            }
        }
        
        myModal.show();
    }
</script>
@endpush
