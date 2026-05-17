@extends('layouts.admin')

@section('title', 'Currencies')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center border-bottom-0 pb-0">
        <div>
            <h5 class="card-title mb-1 fw-bold">Currencies</h5>
            <small class="text-muted">Manage system currencies</small>
        </div>
        <button type="button" class="btn btn-primary" onclick="openDialog()">
            <i class="bx bx-plus me-1"></i> Add Currency
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
                        <th class="text-uppercase" style="font-size: 0.75rem;">Code</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Name</th>
                        <th class="text-uppercase" style="font-size: 0.75rem;">Symbol</th>
                        <th class="text-uppercase text-center" style="font-size: 0.75rem; width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($items as $item)
                    <tr>
                        <td><span class="fw-medium">#{{ $item->id }}</span></td>
                        <td><span class="badge bg-label-primary">{{ $item->code }}</span></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->symbol }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-sm btn-info text-white" 
                                    onclick="openDialog({{ $item->id }}, '{{ addslashes($item->code) }}', '{{ addslashes($item->name) }}', '{{ addslashes($item->symbol) }}')">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </button>
                                <form action="{{ route('currencies.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this currency?');">
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
                        <td colspan="5" class="text-center py-4 text-muted">No currencies found. Click "Add Currency" to create one.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="currencyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom pb-3">
                <h5 class="modal-title fw-bold" id="modalTitle">New Currency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="currencyForm" action="" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-body pt-4">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;" for="code">Currency Code</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="e.g., USD, AED" required />
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;" for="symbol">Symbol</label>
                            <input type="text" class="form-control" id="symbol" name="symbol" placeholder="e.g., $, AED" required />
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;" for="name">Currency Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="e.g., US Dollar" required />
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
    function openDialog(id = null, code = '', name = '', symbol = '') {
        var myModal = new bootstrap.Modal(document.getElementById('currencyModal'));
        var form = document.getElementById('currencyForm');
        
        document.getElementById('code').value = code;
        document.getElementById('name').value = name;
        document.getElementById('symbol').value = symbol;
        
        if (id) {
            document.getElementById('modalTitle').innerText = 'Edit Currency';
            document.getElementById('formMethod').value = 'PUT';
            form.action = '/admin/currencies/' + id;
        } else {
            document.getElementById('modalTitle').innerText = 'New Currency';
            document.getElementById('formMethod').value = 'POST';
            form.action = '/admin/currencies';
        }
        
        myModal.show();
    }
</script>
@endpush
