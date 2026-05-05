@extends('layouts.admin')

@section('title', 'Clients')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Clients</h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clientModal" onclick="resetForm()">
            <i class="bi bi-plus"></i> Add Client
        </button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Client Title</th>
                    <th>Contact Info</th>
                    <th>Verified</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($clients as $client)
                <tr>
                    <td>
                        @if($client->getFirstMediaUrl('logo'))
                            <img src="{{ $client->getFirstMediaUrl('logo') }}" alt="Logo" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                        @else
                            <div class="avatar-initial rounded-circle bg-label-primary text-center" style="width: 40px; height: 40px; line-height: 40px;">
                                {{ substr($client->title, 0, 1) }}
                            </div>
                        @endif
                    </td>
                    <td><strong>{{ $client->title }}</strong></td>
                    <td>
                        <small>
                            <i class="bi bi-envelope"></i> {{ $client->contact_email }}<br>
                            <i class="bi bi-telephone"></i> {{ $client->contact_number }}
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
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editClient({{ $client->toJson() }})">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-trash me-1"></i> Delete
                                    </button>
                                </form>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="clientForm" action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Client Title</label>
                        <input type="text" name="title" id="clientTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" id="clientLogo" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="contact_email" id="clientEmail" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="contact_number" id="clientPhone" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="verified" value="1" id="clientVerified">
                            <label class="form-check-label" for="clientVerified"> Verified Client </label>
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
    .bg-label-primary { background-color: #e7e7ff !important; color: #696cff !important; }
</style>

@push('scripts')
<script>
    function resetForm() {
        document.getElementById('clientForm').action = "{{ route('clients.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('clientTitle').value = '';
        document.getElementById('clientEmail').value = '';
        document.getElementById('clientPhone').value = '';
        document.getElementById('clientVerified').checked = false;
        document.getElementById('modalTitle').innerText = 'Add Client';
    }

    function editClient(client) {
        document.getElementById('clientForm').action = "/admin/clients/" + client.id;
        document.getElementById('methodField').innerHTML = '@method("PUT")';
        document.getElementById('clientTitle').value = client.title;
        document.getElementById('clientEmail').value = client.contact_email;
        document.getElementById('clientPhone').value = client.contact_number;
        document.getElementById('clientVerified').checked = !!client.verified;
        document.getElementById('modalTitle').innerText = 'Edit Client';
        
        var myModal = new bootstrap.Modal(document.getElementById('clientModal'));
        myModal.show();
    }
</script>
@endpush
@endsection
