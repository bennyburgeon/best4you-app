@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Users</h5>
        @can('create users')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" onclick="resetForm()">
            <i class="bi bi-plus"></i> Add User
        </button>
        @endcan
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Date Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($users as $user)
                <tr>
                    <td><strong>{{ $user->name }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-label-secondary mb-1">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @can('edit users')
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editUser({{ $user->toJson() }})">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete users')
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
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
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="userForm" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" id="userName" class="form-control" placeholder="e.g. John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="userEmail" class="form-control" placeholder="john@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" id="userPassword" class="form-control" placeholder="••••••••">
                        <small class="text-muted" id="passwordHint">Required for new users.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Roles</label>
                        <div class="row">
                            @foreach($roles as $role)
                            <div class="col-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input role-checkbox" type="checkbox" name="roles[]" value="{{ $role->name }}" id="role_{{ $role->id }}">
                                    <label class="form-check-label" for="role_{{ $role->id }}">
                                        {{ $role->name }}
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
    .bg-label-secondary { background-color: #ebeef0 !important; color: #8592a3 !important; }
</style>

@push('scripts')
<script>
    function resetForm() {
        document.getElementById('userForm').action = "{{ route('users.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('userName').value = '';
        document.getElementById('userEmail').value = '';
        document.getElementById('userPassword').value = '';
        document.getElementById('userPassword').required = true;
        document.getElementById('passwordHint').innerText = 'Required for new users.';
        document.querySelectorAll('.role-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('modalTitle').innerText = 'Add User';
    }

    function editUser(user) {
        document.getElementById('userForm').action = "/admin/users/" + user.id;
        document.getElementById('methodField').innerHTML = '@method("PUT")';
        document.getElementById('userName').value = user.name;
        document.getElementById('userEmail').value = user.email;
        document.getElementById('userPassword').value = '';
        document.getElementById('userPassword').required = false;
        document.getElementById('passwordHint').innerText = 'Leave blank to keep current password.';
        
        document.querySelectorAll('.role-checkbox').forEach(cb => cb.checked = false);
        user.roles.forEach(role => {
            const cb = document.querySelector(`.role-checkbox[value="${role.name}"]`);
            if (cb) cb.checked = true;
        });
        
        document.getElementById('modalTitle').innerText = 'Edit User';
        
        var myModal = new bootstrap.Modal(document.getElementById('userModal'));
        myModal.show();
    }
</script>
@endpush
@endsection
