@extends('layouts.admin')

@section('title', 'Post New Job')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Job Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Title</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Senior Software Engineer" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Job Code</label>
                            <input type="text" name="job_code" class="form-control" placeholder="e.g. B4U-001">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Job Category</label>
                            <select name="job_category_id" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Industry Type</label>
                            <select name="industry_type_id" class="form-select">
                                <option value="">Select Industry</option>
                                @foreach($industries as $industry)
                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Client / Company</label>
                            <select name="client_id" class="form-select">
                                <option value="">Select Client</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Gender Preference</label>
                            <select name="gender_preference" class="form-select">
                                <option value="Any">Any</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Experience (Min)</label>
                            <input type="number" name="experience_min" class="form-control" placeholder="Years">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Experience (Max)</label>
                            <input type="number" name="experience_max" class="form-control" placeholder="Years">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Salary (From)</label>
                            <input type="number" name="salary_from" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Salary (To)</label>
                            <input type="number" name="salary_to" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Currency</label>
                            <select name="currency_id" class="form-select">
                                @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->code }} ({{ $currency->symbol }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Opening Date</label>
                            <input type="date" name="opening_date" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Closing Date</label>
                            <input type="date" name="closing_date" class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Skills (Separate with commas)</label>
                            <input type="text" id="skillsInput" class="form-control" placeholder="e.g. PHP, Laravel, Vue">
                            <div id="skillsTags" class="mt-2 d-flex flex-wrap gap-2"></div>
                            <!-- Hidden inputs for skills -->
                            <div id="hiddenSkills"></div>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Roles & Responsibilities</label>
                            <textarea name="roles_and_responsibility" id="editor" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Create Job Posting</button>
                        <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 300,
        menubar: false,
        plugins: 'lists link code help wordcount',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | removeformat | help'
    });

    // Simple Skill Tagging
    const skillsInput = document.getElementById('skillsInput');
    const skillsTags = document.getElementById('skillsTags');
    const hiddenSkills = document.getElementById('hiddenSkills');
    let skills = [];

    skillsInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const val = this.value.trim().replace(',', '');
            if (val && !skills.includes(val)) {
                addSkill(val);
                this.value = '';
            }
        }
    });

    function addSkill(name) {
        skills.push(name);
        renderSkills();
    }

    function removeSkill(index) {
        skills.splice(index, 1);
        renderSkills();
    }

    function renderSkills() {
        skillsTags.innerHTML = '';
        hiddenSkills.innerHTML = '';
        skills.forEach((skill, index) => {
            const tag = document.createElement('span');
            tag.className = 'badge bg-primary d-flex align-items-center gap-1 p-2';
            tag.innerHTML = `${skill} <i class="bi bi-x cursor-pointer" onclick="removeSkill(${index})"></i>`;
            skillsTags.appendChild(tag);

            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'skills[]';
            hidden.value = skill;
            hiddenSkills.appendChild(hidden);
        });
    }
</script>
@endpush
@endsection
