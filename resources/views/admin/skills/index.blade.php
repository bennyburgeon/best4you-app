@extends('layouts.admin')

@section('title', 'Skills')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Skills</h5>
        @can('create skills')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#skillModal" onclick="resetForm()">
            <i class="bi bi-plus"></i> Add Skill
        </button>
        @endcan
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Skill Name</th>
                    <th>Date Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($skills as $skill)
                <tr>
                    <td><strong>{{ $skill->name }}</strong></td>
                    <td>{{ $skill->created_at->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @can('edit skills')
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editSkill({{ $skill->toJson() }})">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                @can('delete skills')
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?')">
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
<div class="modal fade" id="skillModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="skillForm" action="{{ route('skills.store') }}" method="POST">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Skill Name</label>
                            <input type="text" name="name" id="skillName" class="form-control" placeholder="e.g. PHP" required>
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
        document.getElementById('skillForm').action = "{{ route('skills.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('skillName').value = '';
        document.getElementById('modalTitle').innerText = 'Add Skill';
    }

    function editSkill(skill) {
        document.getElementById('skillForm').action = "/admin/skills/" + skill.id;
        document.getElementById('methodField').innerHTML = '@method("PUT")';
        document.getElementById('skillName').value = skill.name;
        document.getElementById('modalTitle').innerText = 'Edit Skill';
        
        var myModal = new bootstrap.Modal(document.getElementById('skillModal'));
        myModal.show();
    }
</script>
@endpush
@endsection
