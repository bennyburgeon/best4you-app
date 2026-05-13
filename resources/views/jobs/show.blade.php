@extends('layouts.app')
@section('title', $job->title)
@section('content')
<div class="job-details-page">
    <section class="detail-hero">
        <div class="container">
            <div class="breadcrumb-row">
                <a href="{{ url('/') }}">Home</a><i class="fa fa-angle-right"></i>
                <a href="{{ route('public.jobs') }}">Jobs</a><i class="fa fa-angle-right"></i>
                <span>{{ $job->title }}</span>
            </div>
            <div class="hero-card">
                <div class="role-mark">{{ strtoupper(substr($job->title, 0, 2)) }}</div>
                <div class="role-intro">
                    <div class="meta-row">
                        @if($job->job_code)<span class="code-pill"><i class="fa fa-hashtag"></i>{{ $job->job_code }}</span>@endif
                        <span class="category-pill">{{ $job->category->name ?? 'General' }}</span>
                        @if($job->jobType)<span class="type-pill"><i class="fa fa-star"></i>{{ $job->jobType->name }}</span>@endif
                    </div>
                    <h1>{{ $job->title }}</h1>
                    <div class="hero-facts">
                        <span><i class="fa fa-map-marker"></i>{{ $job->location ?: 'Remote' }}</span>
                        <span><i class="fa fa-clock-o"></i>Posted {{ optional($job->created_at)->diffForHumans() }}</span>
                        <span><i class="fa fa-briefcase"></i>{{ $job->experience_min !== null ? $job->experience_min.'-'.$job->experience_max.' Yrs' : 'Any experience' }}</span>
                    </div>
                </div>
                <button type="button" class="hero-apply js-open-apply">Apply Now <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
    </section>

    <section class="detail-content">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-8">
                    <article class="content-card">
                        <div class="section-heading"><span>Role Description</span><h2>Responsibilities and expectations</h2></div>
                        <div class="job-description">{!! $job->roles_and_responsibility !!}</div>
                    </article>
                </div>
                <aside class="col-lg-4">
                    <div class="overview-card">
                        <div class="overview-header"><h2>Job Overview</h2><span>Quick details</span></div>
                        <ul class="overview-list">
                            <li><i class="fa fa-money"></i><div><span>Salary Range</span><strong>{{ ($job->currency->symbol ?? '').$job->salary_from }} - {{ ($job->currency->symbol ?? '').$job->salary_to }}</strong></div></li>
                            <li><i class="fa fa-briefcase"></i><div><span>Job Category</span><strong>{{ $job->category->name ?? 'General' }}</strong></div></li>
                            @if($job->jobType)<li><i class="fa fa-star"></i><div><span>Employment Type</span><strong>{{ $job->jobType->name }}</strong></div></li>@endif
                            <li><i class="fa fa-calendar"></i><div><span>Closing Date</span><strong>{{ $job->closing_date ? \Carbon\Carbon::parse($job->closing_date)->format('d M Y') : 'Ongoing' }}</strong></div></li>
                            <li><i class="fa fa-map-marker"></i><div><span>Location</span><strong>{{ $job->location ?: 'Remote' }}</strong></div></li>
                        </ul>
                        <button type="button" class="apply-button js-open-apply">Apply for this role</button>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>

<div id="applyModal" class="apply-modal" style="display:none;">
    <div class="modal-shell">
        <div class="modal-header-custom">
            <div>
                <span>Application</span>
                <h3>Apply for {{ $job->title }}</h3>
            </div>
            <button type="button" class="modal-close js-close-apply" aria-label="Close application form">
                <i class="fa fa-times"></i>
            </button>
        </div>

        <form class="application-form" action="{{ route('public.job-applications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}">

            <label>
                <span>Full Name</span>
                <input type="text" name="name" required>
            </label>
            <label>
                <span>Email Address</span>
                <input type="email" name="email" required>
            </label>
            <label>
                <span>Phone Number</span>
                <input type="text" name="phone" required>
            </label>
            <label>
                <span>Upload Resume</span>
                <input type="file" name="resume" accept=".pdf,.doc,.docx">
            </label>

            <div class="form-actions">
                <button type="button" class="cancel-button js-close-apply">Cancel</button>
                <button class="submit-button" type="submit">Submit Application</button>
            </div>
        </form>
    </div>
</div>

<style>
.job-details-page{background:#f4f7fb;color:#2C2D3F;font-size:14px;min-height:100vh}
.detail-hero{background:linear-gradient(135deg,rgba(31,64,121,.92),rgba(44,45,63,.74)),url('/frontend/assets/img/slider3.webp') center/cover;border-bottom-left-radius:25px;border-bottom-right-radius:25px;color:#fff;padding:55px 0 95px}
.breadcrumb-row{display:flex;align-items:center;gap:10px;flex-wrap:wrap;color:rgba(255,255,255,.78);font-size:14px;margin-bottom:25px}
.breadcrumb-row a{color:#fff;text-decoration:none}
.hero-card{display:grid;grid-template-columns:auto 1fr auto;gap:20px;align-items:center;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.24);border-radius:20px;box-shadow:0 15px 35px rgba(0,0,0,.16);padding:24px}
.role-mark{width:70px;height:70px;border-radius:15px;background:#fff;color:#1f4079;font-size:20px;font-weight:600;display:flex;align-items:center;justify-content:center}
.meta-row{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:12px}
.category-pill,.code-pill,.type-pill{border-radius:999px;display:inline-flex;font-size:11px;font-weight:600;padding:6px 12px;text-transform:uppercase}
.category-pill{background:rgba(255,255,255,.18);color:#fff}
.code-pill{background:#fff;color:#1f4079}
.type-pill{background:#e11d48;color:#fff}
.role-intro h1{font-size:38px;font-weight:700;line-height:42px;margin:0 0 14px}
.hero-facts{display:flex;flex-wrap:wrap;gap:12px 24px}
.hero-facts span{color:rgba(255,255,255,.84);font-size:14px}
.hero-facts i{color:#fff;margin-right:8px}
.hero-apply,.apply-button,.submit-button{background:#1f4079;border:0;border-radius:40px;color:#fff;display:inline-flex;align-items:center;justify-content:center;gap:10px;font-size:14px;font-weight:500;min-height:46px;padding:13px 25px}
.hero-apply{background:#fff;color:#1f4079}
.detail-content{margin-top:-62px;padding-bottom:70px}
.content-card,.overview-card{background:#fff;border:1px solid #e6edf5;border-radius:15px;box-shadow:0 10px 30px rgba(32,48,73,.08)}
.content-card{padding:28px;margin-bottom:20px}
.section-heading span,.overview-header span{color:#1f4079;font-size:13px;font-weight:600;text-transform:uppercase}
.section-heading h2,.overview-header h2{font-size:24px;font-weight:600;margin:8px 0 20px}
.job-description{font-size:14px;line-height:24px;color:#526173}
.overview-card{padding:22px;position:sticky;top:96px}
.overview-list{list-style:none;padding:0;margin:0}
.overview-list li{display:flex;align-items:center;gap:14px;background:#f7f9fc;border:1px solid #e8eef5;border-radius:12px;padding:13px;margin-bottom:12px}
.overview-list i{width:44px;height:44px;display:flex;align-items:center;justify-content:center;border-radius:12px;background:#eef2fa;color:#1f4079}
.overview-list span{display:block;font-size:12px;color:#718096;text-transform:uppercase}
.overview-list strong{display:block;font-size:14px;color:#2C2D3F}
.apply-button{width:100%;margin-top:12px}
.apply-modal{position:fixed;inset:0;background:rgba(13,24,39,.58);z-index:1050;display:flex;align-items:center;justify-content:center;padding:22px}
.modal-shell{background:#fff;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.2);max-width:560px;width:100%;padding:24px}
.modal-header-custom{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:18px}
.modal-header-custom span{color:#1f4079;font-size:13px;font-weight:600;text-transform:uppercase}
.modal-header-custom h3{font-size:22px;font-weight:600;margin:4px 0 0}
.modal-close{width:42px;height:42px;border:0;border-radius:12px;background:#f3f6fa;color:#526173;display:flex;align-items:center;justify-content:center}
.application-form{display:grid;gap:14px}
.application-form label span{display:block;color:#526173;font-size:13px;font-weight:500;margin-bottom:7px}
.application-form input{width:100%;min-height:46px;border:1px solid #e8eef5;border-radius:12px;background:#f7f9fc;padding:10px 14px}
.form-actions{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.cancel-button{border:0;border-radius:12px;background:#f3f6fa;color:#526173;font-size:14px;font-weight:500}
@media(max-width:991px){.hero-card{grid-template-columns:1fr}.detail-hero{padding-bottom:88px}.overview-card{position:static}}
@media(max-width:575px){.role-intro h1{font-size:30px;line-height:36px}.content-card,.overview-card,.hero-card,.modal-shell{border-radius:15px}.form-actions{grid-template-columns:1fr}}
</style>
@push('scripts')
<script>
$(function () {
    $('.js-open-apply').on('click', function () {
        $('#applyModal').fadeIn(150);
    });
    $('.js-close-apply').on('click', function () {
        $('#applyModal').fadeOut(150);
    });
    $('#applyModal').on('click', function (e) {
        if (e.target === this) {
            $('#applyModal').fadeOut(150);
        }
    });
});
</script>
@endpush
@endsection
