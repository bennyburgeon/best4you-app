@extends('layouts.admin')

@section('title', 'Roles & Permissions')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Roles</h5>
        @can('create roles')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#roleModal" onclick="resetForm()">
            <i class="bi bi-plus"></i> Add Role
        </button>
        @endcan
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Role Name</th>
                    <th>Permissions</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($roles as $role)
                <tr>
                    <td><strong>{{ $role->name }}</strong></td>
                    <td style="max-width: 400px; white-space: normal;">
                        @foreach($role->permissions as $permission)
                            <span class="badge bg-label-primary mb-1">{{ $permission->name }}</span>
                        @endforeach
                    </td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @can('edit roles')
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editRole({{ $role->toJson() }})">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete roles')
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?')">
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
<div class="modal fade" id="roleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="roleForm" action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Role Name</label>
                        <input type="text" name="name" id="roleName" class="form-control" placeholder="e.g. Manager" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Permissions</label>
                        <div class="row">
                            @foreach($permissions as $permission)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input permission-checkbox" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}">
                                    <label class="form-check-label" for="perm_{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
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
    .bg-label-primary { background-color: #e7e7ff !important; color: #696cff !important; }
</style>

@push('scripts')
<script>
    function resetForm() {
        document.getElementById('roleForm').action = "{{ route('roles.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('roleName').value = '';
        document.querySelectorAll('.permission-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('modalTitle').innerText = 'Add Role';
    }

    function editRole(role) {
        document.getElementById('roleForm').action = "/admin/roles/" + role.id;
        document.getElementById('methodField').innerHTML = '@method("PUT")';
        document.getElementById('roleName').value = role.name;
        
        document.querySelectorAll('.permission-checkbox').forEach(cb => cb.checked = false);
        role.permissions.forEach(perm => {
            const cb = document.querySelector(`.permission-checkbox[value="${perm.name}"]`);
            if (cb) cb.checked = true;
        });
        
        document.getElementById('modalTitle').innerText = 'Edit Role';
        
        var myModal = new bootstrap.Modal(document.getElementById('roleModal'));
        myModal.show();
    }
</script>
@endpush
@endsection
