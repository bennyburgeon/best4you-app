@extends('layouts.admin')

@section('title', 'Currencies')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Currencies</h5>
        @can('create currencies')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#currencyModal" onclick="resetForm()">
            <i class="bi bi-plus"></i> Add Currency
        </button>
        @endcan
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Currency Name</th>
                    <th>Code</th>
                    <th>Symbol</th>
                    <th>Date Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($currencies as $currency)
                <tr>
                    <td><strong>{{ $currency->name }}</strong></td>
                    <td>{{ $currency->code }}</td>
                    <td>{{ $currency->symbol }}</td>
                    <td>{{ $currency->created_at->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @can('edit currencies')
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editCurrency({{ $currency->toJson() }})">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete currencies')
                                <form action="{{ route('currencies.destroy', $currency->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this currency?')">
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
<div class="modal fade" id="currencyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Currency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="currencyForm" action="{{ route('currencies.store') }}" method="POST">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Currency Name</label>
                            <input type="text" name="name" id="currencyName" class="form-control" placeholder="e.g. Indian Rupee" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" name="code" id="currencyCode" class="form-control" placeholder="e.g. INR" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Symbol</label>
                            <input type="text" name="symbol" id="currencySymbol" class="form-control" placeholder="e.g. ₹" required>
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
        document.getElementById('currencyForm').action = "{{ route('currencies.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('currencyName').value = '';
        document.getElementById('currencyCode').value = '';
        document.getElementById('currencySymbol').value = '';
        document.getElementById('modalTitle').innerText = 'Add Currency';
    }

    function editCurrency(currency) {
        document.getElementById('currencyForm').action = "/admin/currencies/" + currency.id;
        document.getElementById('methodField').innerHTML = '@method("PUT")';
        document.getElementById('currencyName').value = currency.name;
        document.getElementById('currencyCode').value = currency.code;
        document.getElementById('currencySymbol').value = currency.symbol;
        document.getElementById('modalTitle').innerText = 'Edit Currency';
        
        var myModal = new bootstrap.Modal(document.getElementById('currencyModal'));
        myModal.show();
    }
</script>
@endpush
@endsection
