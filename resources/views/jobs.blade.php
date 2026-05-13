@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
<div class="jobs-page">
    <section class="jobs-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="hero-kicker">BestForYou Careers</span>
                    <h1>Find a role that fits your next chapter.</h1>
                    <p>Explore curated openings, compare role details quickly, and apply with confidence.</p>
                </div>
                <div class="col-lg-5">
                    <div class="hero-stats">
                        <div><strong>{{ $jobs->total() }}</strong><span>Open roles</span></div>
                        <div><strong>{{ $jobs->pluck('location')->filter()->unique()->count() ?: 1 }}</strong><span>Locations</span></div>
                        <div><strong>{{ $categories->count() ?: 1 }}</strong><span>Categories</span></div>
                    </div>
                </div>
            </div>

            <form class="search-dock" method="GET" action="{{ route('public.jobs') }}">
                <label class="search-field">
                    <i class="fa fa-search"></i>
                    <span>What</span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Job title, skill, keyword">
                </label>
                <label class="search-field">
                    <i class="fa fa-map-marker"></i>
                    <span>Where</span>
                    <input type="text" name="location" value="{{ request('location') }}" placeholder="City, state, remote">
                </label>
                <button type="submit" class="search-button">Search Jobs <i class="fa fa-arrow-right"></i></button>
            </form>
        </div>
    </section>

    <section class="jobs-content">
        <div class="container">
            <div class="row g-4 align-items-start">
                <aside class="col-xl-3 col-lg-4">
                    <form class="filter-panel" method="GET" action="{{ route('public.jobs') }}">
                        <div class="panel-heading">
                            <span>Refine Search</span>
                            @if(request('search') || request('location') || request('category_id'))
                                <a href="{{ route('public.jobs') }}">Clear</a>
                            @endif
                        </div>

                        <label class="panel-input">
                            <span>Keywords</span>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="UI designer, sales, PHP">
                        </label>
                        <label class="panel-input">
                            <span>Location</span>
                            <input type="text" name="location" value="{{ request('location') }}" placeholder="Kozhikode, Kochi, Remote">
                        </label>

                        <div class="panel-category">
                            <span>Category</span>
                            <div class="category-options">
                                <label><input type="radio" name="category_id" value="" {{ request('category_id') ? '' : 'checked' }}>All categories</label>
                                @foreach($categories as $category)
                                    <label><input type="radio" name="category_id" value="{{ $category->id }}" {{ (string)request('category_id') === (string)$category->id ? 'checked' : '' }}>{{ $category->name }}</label>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="panel-button">Apply Filters</button>
                    </form>
                </aside>

                <div class="col-xl-9 col-lg-8">
                    <div class="results-toolbar">
                        <div>
                            <span class="eyebrow">Available opportunities</span>
                            <h2>{{ $jobs->total() }} {{ $jobs->total() === 1 ? 'role' : 'roles' }} found</h2>
                        </div>
                    </div>

                    @if($jobs->count())
                        <div class="job-list">
                            @foreach($jobs as $job)
                                <article class="job-card">
                                    <div class="job-card-accent"></div>
                                    <div class="company-mark">{{ strtoupper(substr($job->title, 0, 2)) }}</div>
                                    <div class="job-card-main">
                                        <div class="job-meta-top">
                                            @if($job->job_code)<span class="code-pill"><i class="fa fa-hashtag"></i>{{ $job->job_code }}</span>@endif
                                            <span class="category-pill">{{ $job->category->name ?? 'General' }}</span>
                                            @if($job->jobType)<span class="type-pill"><i class="fa fa-star"></i>{{ $job->jobType->name }}</span>@endif
                                            <span><i class="fa fa-clock-o"></i>{{ $job->posted_days_ago === 0 ? 'Just now' : $job->posted_days_ago.' days ago' }}</span>
                                        </div>
                                        <h3><a href="{{ route('public.jobs.show', $job->id) }}">{{ $job->title }}</a></h3>
                                        <div class="job-facts">
                                            <span><i class="fa fa-map-marker"></i>{{ $job->location ?: 'Remote' }}</span>
                                            <span><i class="fa fa-briefcase"></i>{{ $job->experience_min !== null ? $job->experience_min.'-'.$job->experience_max.' Yrs' : 'Any experience' }}</span>
                                            <span><i class="fa fa-money"></i>{{ ($job->currency->symbol ?? '').$job->salary_from }} - {{ ($job->currency->symbol ?? '').$job->salary_to }}</span>
                                        </div>
                                    </div>
                                    <div class="job-card-action">
                                        <a class="details-button" href="{{ route('public.jobs.show', $job->id) }}">View Details <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="mt-4">{{ $jobs->withQueryString()->links() }}</div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon"><i class="fa fa-search"></i></div>
                            <h3>No matching jobs found</h3>
                            <p>Try another keyword, location, or reset filters.</p>
                            <a href="{{ route('public.jobs') }}" class="search-button">Reset Search</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.jobs-page{background:#f4f7fb;color:#2C2D3F;font-size:14px;min-height:100vh}
.jobs-hero{background:linear-gradient(135deg,rgba(31,64,121,.92),rgba(44,45,63,.74)),url('/frontend/assets/img/slider3.webp') center/cover;border-bottom-left-radius:25px;border-bottom-right-radius:25px;color:#fff;padding:70px 0 95px}
.hero-kicker,.eyebrow{font-size:13px;font-weight:600;text-transform:uppercase}.hero-kicker{margin-bottom:12px;display:inline-flex}
.jobs-hero h1{font-size:38px;line-height:42px;font-weight:700;margin-bottom:15px}.jobs-hero p{font-size:14px;line-height:24px;max-width:560px}
.hero-stats{background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.24);border-radius:20px;display:grid;grid-template-columns:repeat(3,1fr);gap:12px;padding:12px}
.hero-stats div{background:rgba(255,255,255,.13);border-radius:15px;padding:16px 10px;text-align:center}.hero-stats strong{display:block;font-size:28px}.hero-stats span{font-size:13px}
.search-dock{display:grid;grid-template-columns:1fr 1fr auto;gap:6px;background:#fff;border-radius:50px;margin-top:35px;padding:6px 6px 6px 20px}
.search-field{display:grid;grid-template-columns:auto 1fr;gap:2px 12px;background:#f3f7fb;border:1px solid #e6eef6;border-radius:40px;padding:10px 14px;margin:0}
.search-field span{font-size:12px}.search-field input{border:0;background:transparent}
.search-button,.panel-button,.details-button{background:#1f4079;color:#fff;border:0;border-radius:40px;padding:13px 25px;text-decoration:none;display:inline-flex;align-items:center;gap:8px}
.jobs-content{margin-top:-62px;padding-bottom:70px}.filter-panel,.job-card,.results-toolbar,.empty-state{background:#fff;border:1px solid #e6edf5;border-radius:15px;padding:20px}
.panel-heading{display:flex;justify-content:space-between;margin-bottom:18px}.panel-input{display:block;background:#f7f9fc;border:1px solid #e8eef5;border-radius:12px;padding:11px 14px;margin-bottom:14px}
.panel-category span{display:block;margin-bottom:8px}.category-options{max-height:220px;overflow:auto;display:grid;gap:8px}.category-options label{background:#f7f9fc;border:1px solid #e8eef5;border-radius:12px;padding:10px 13px}
.results-toolbar h2{font-size:24px}.job-list{display:grid;gap:18px}.job-card{display:grid;grid-template-columns:auto 1fr auto;gap:18px;position:relative}
.job-card-accent{position:absolute;left:0;top:20px;bottom:20px;width:6px;background:linear-gradient(180deg,#1f4079,#d81f34);border-radius:0 999px 999px 0}
.company-mark{width:56px;height:56px;background:#eef2fa;border-radius:15px;display:flex;align-items:center;justify-content:center;color:#1f4079;font-weight:600}
.job-meta-top{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:10px}.category-pill,.code-pill,.type-pill{border-radius:999px;padding:6px 12px;font-size:11px;text-transform:uppercase}
.category-pill{background:#eef2fa;color:#1f4079}.code-pill{background:#fff2f2;color:#b42318}.type-pill{background:#e11d48;color:#fff}
.job-card h3{font-size:20px}.job-card h3 a{color:#2C2D3F}.job-facts{display:flex;flex-wrap:wrap;gap:12px 20px}
.empty-state{text-align:center}.empty-icon{width:74px;height:74px;border-radius:15px;background:#eef2fa;color:#1f4079;display:flex;align-items:center;justify-content:center;margin:0 auto 20px}
@media(max-width:991px){.search-dock,.job-card{grid-template-columns:1fr}.hero-stats{grid-template-columns:1fr}.jobs-hero h1{font-size:30px;line-height:36px}}
</style>
@endsection
