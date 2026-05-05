@extends('layouts.admin')

@section('title', 'Clients')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Clients</h5>
        @can('create clients')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clientModal" onclick="resetForm()">
            <i class="bi bi-plus"></i> Add Client
        </button>
        @endcan
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Client Name</th>
                    <th>Contact</th>
                    <th>HR Details</th>
                    <th>Verified</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($clients as $client)
                <tr>
                    <td>
                        @if($client->getFirstMediaUrl('logo'))
                            <img src="{{ $client->getFirstMediaUrl('logo') }}" alt="logo" class="rounded" width="40" height="40" style="object-fit: contain;">
                        @else
                            <div class="rounded bg-light d-flex align-items-center justify-content-center" width="40" height="40">
                                <i class="bi bi-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td><strong>{{ $client->title }}</strong></td>
                    <td>
                        <small>
                            <i class="bi bi-telephone"></i> {{ $client->contact_number ?: 'N/A' }}<br>
                            <i class="bi bi-envelope"></i> {{ $client->contact_email ?: 'N/A' }}
                        </small>
                    </td>
                    <td>
                        <small>
                            <strong>{{ $client->hr_name ?: 'N/A' }}</strong><br>
                            {{ $client->hr_contact ?: '' }} {{ $client->hr_email ?: '' }}
                        </small>
                    </td>
                    <td>
                        @if($client->verified)
                            <span class="badge bg-label-success">Verified</span>
                        @else
                            <span class="badge bg-label-secondary">Unverified</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @can('edit clients')
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editClient({{ $client->toJson() }}, '{{ $client->getFirstMediaUrl('logo') }}')">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete clients')
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?')">
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
<div class="modal fade" id="clientModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="clientForm" action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" name="title" id="clientTitle" class="form-control" placeholder="e.g. Acme Corp" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            <div id="currentLogo" class="mt-2 d-none">
                                <img src="" id="logoPreview" class="rounded border" width="60" height="60" style="object-fit: contain;">
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" name="remove_logo" value="1" id="removeLogo">
                                    <label class="form-check-label" for="removeLogo">Remove current logo</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact_number" id="clientContactNumber" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" name="contact_email" id="clientContactEmail" class="form-control">
                        </div>
                        
                        <div class="col-12 mt-3">
                            <h6 class="border-bottom pb-2">HR Details</h6>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">HR Name</label>
                            <input type="text" name="hr_name" id="clientHrName" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">HR Contact</label>
                            <input type="text" name="hr_contact" id="clientHrContact" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">HR Email</label>
                            <input type="email" name="hr_email" id="clientHrEmail" class="form-control">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="verified" value="1" id="clientVerified">
                                <label class="form-check-label" for="clientVerified">Verified Client</label>
                            </div>
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

<style>
    .bg-label-success { background-color: #e8fadf !important; color: #71dd37 !important; }
    .bg-label-secondary { background-color: #ebeef0 !important; color: #8592a3 !important; }
</style>

@push('scripts')
<script>
    function resetForm() {
        document.getElementById('clientForm').action = "{{ route('clients.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('clientTitle').value = '';
        document.getElementById('clientContactNumber').value = '';
        document.getElementById('clientContactEmail').value = '';
        document.getElementById('clientHrName').value = '';
        document.getElementById('clientHrContact').value = '';
        document.getElementById('clientHrEmail').value = '';
        document.getElementById('clientVerified').checked = false;
        document.getElementById('currentLogo').classList.add('d-none');
        document.getElementById('modalTitle').innerText = 'Add Client';
    }

    function editClient(client, logoUrl) {
        document.getElementById('clientForm').action = "/admin/clients/" + client.id;
        document.getElementById('methodField').innerHTML = '@method("PUT")';
        document.getElementById('clientTitle').value = client.title;
        document.getElementById('clientContactNumber').value = client.contact_number || '';
        document.getElementById('clientContactEmail').value = client.contact_email || '';
        document.getElementById('clientHrName').value = client.hr_name || '';
        document.getElementById('clientHrContact').value = client.hr_contact || '';
        document.getElementById('clientHrEmail').value = client.hr_email || '';
        document.getElementById('clientVerified').checked = client.verified == 1;
        
        if (logoUrl) {
            document.getElementById('logoPreview').src = logoUrl;
            document.getElementById('currentLogo').classList.remove('d-none');
            document.getElementById('removeLogo').checked = false;
        } else {
            document.getElementById('currentLogo').classList.add('d-none');
        }
        
        document.getElementById('modalTitle').innerText = 'Edit Client';
        
        var myModal = new bootstrap.Modal(document.getElementById('clientModal'));
        myModal.show();
    }
</script>
@endpush
@endsection
