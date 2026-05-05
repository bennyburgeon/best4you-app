<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Skill;
use Illuminate\Http\Request;

use App\Models\JobCategory;
use App\Models\IndustryType;
use App\Models\Client;
use App\Models\Currency;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with(['category', 'skills', 'client', 'currency', 'industryType']);

        // Frontend Date Filtering
        if (!$request->has('all')) {
            $today = now()->toDateString();
            $query->where(function($q) use ($today) {
                $q->whereNull('opening_date')
                  ->orWhere('opening_date', '<=', $today);
            })->where(function($q) use ($today) {
                $q->whereNull('closing_date')
                  ->orWhere('closing_date', '>=', $today);
            });
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('job_code', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhereHas('client', function ($cq) use ($search) {
                        $cq->where('title', 'like', "%{$search}%");
                    })
                    ->orWhereHas('skills', function ($sq) use ($search) {
                        $sq->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->has('category_id') && $request->category_id !== "null") {
            $query->where('job_category_id', $request->category_id);
        }

        if ($request->has('industry_type_id')) {
            $query->where('industry_type_id', $request->industry_type_id);
        }

        $jobs = $query->latest()->get();

        if ($request->wantsJson()) {
            return response()->json($jobs);
        }

        return view('admin.jobs.index', compact('jobs'));
    }

    public function publicIndex(Request $request)
    {
        $query = Job::with(['category', 'client', 'currency', 'industryType']);
        
        $today = now()->toDateString();
        $query->where(function($q) use ($today) {
            $q->whereNull('opening_date')->orWhere('opening_date', '<=', $today);
        })->where(function($q) use ($today) {
            $q->whereNull('closing_date')->orWhere('closing_date', '>=', $today);
        });

        if ($request->has('category')) {
            $query->where('job_category_id', $request->category);
        }

        $jobs = $query->latest()->paginate(10);
        $categories = JobCategory::all();

        return view('jobs', compact('jobs', 'categories'));
    }

    public function create()
    {
        $categories = JobCategory::all();
        $industries = IndustryType::all();
        $clients = Client::all();
        $currencies = Currency::all();
        $skills = Skill::all();
        return view('admin.jobs.create', compact('categories', 'industries', 'clients', 'currencies', 'skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_code' => 'nullable|string|unique:jobs',
            'title' => 'required|string|max:255',
            'job_category_id' => 'required',
            'industry_type_id' => 'nullable|exists:industry_types,id',
            'skills' => 'nullable|array',
            'client_id' => 'nullable|exists:clients,id',
            'currency_id' => 'nullable|exists:currencies,id',
            'opening_date' => 'nullable|date',
            'closing_date' => 'nullable|date|after_or_equal:opening_date',
            'gender_preference' => 'nullable|string',
            'experience_min' => 'nullable|integer',
            'experience_max' => 'nullable|integer',
            'salary_from' => 'nullable|numeric',
            'salary_to' => 'nullable|numeric'
        ]);

        $data = $request->except('skills');
        $job = Job::create($data);

        if ($request->has('skills')) {
            $skillIds = $this->syncSkills($request->skills);
            $job->skills()->sync($skillIds);
        }

        if ($request->wantsJson()) {
            return response()->json($job->load('skills', 'client', 'currency', 'industryType'), 201);
        }

        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }

    public function show(Job $job)
    {
        $job->load(['category', 'skills', 'client', 'currency', 'industryType']);
        return view('admin.jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        $categories = JobCategory::all();
        $industries = IndustryType::all();
        $clients = Client::all();
        $currencies = Currency::all();
        $skills = Skill::all();
        $job->load('skills');
        return view('admin.jobs.edit', compact('job', 'categories', 'industries', 'clients', 'currencies', 'skills'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'job_code' => 'nullable|string|unique:jobs,job_code,' . $job->id,
            'title' => 'required|string|max:255',
            'job_category_id' => 'required',
            'industry_type_id' => 'nullable|exists:industry_types,id',
            'roles_and_responsibility' => 'required',
            'skills' => 'nullable|array',
            'client_id' => 'nullable|exists:clients,id',
            'currency_id' => 'nullable|exists:currencies,id',
            'opening_date' => 'nullable|date',
            'closing_date' => 'nullable|date|after_or_equal:opening_date',
            'gender_preference' => 'nullable|string',
            'experience_min' => 'nullable|integer',
            'experience_max' => 'nullable|integer',
            'salary_from' => 'nullable|numeric',
            'salary_to' => 'nullable|numeric'
        ]);

        $data = $request->except('skills');
        $job->update($data);

        if ($request->has('skills')) {
            $skillIds = $this->syncSkills($request->skills);
            $job->skills()->sync($skillIds);
        }

        if ($request->wantsJson()) {
            return response()->json($job->load('skills', 'client', 'currency', 'industryType'));
        }

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        if (request()->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }

    private function syncSkills(array $skills)
    {
        $skillIds = [];
        foreach ($skills as $skillData) {
            // Handle both skill ID and new skill name
            if (is_numeric($skillData)) {
                $skillIds[] = $skillData;
            } else {
                $skill = Skill::firstOrCreate(['name' => $skillData]);
                $skillIds[] = $skill->id;
            }
        }
        return $skillIds;
    }
}
