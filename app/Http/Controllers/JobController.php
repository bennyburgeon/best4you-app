<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Skill;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with(['category', 'skills', 'client', 'currency']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
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

        if ($request->has('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        $jobs = $query->latest()->get()->map(function($job) {
            $job->posted_days_ago = $job->created_at ? $job->created_at->diffInDays(now()) : 0;
            return $job;
        });

        return response()->json($jobs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'job_category_id' => 'required',
            'skills' => 'nullable|array',
            'client_id' => 'nullable|exists:clients,id',
            'currency_id' => 'nullable|exists:currencies,id',
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

        return response()->json($job->load('skills', 'client', 'currency'), 201);
    }

    public function show(Job $job)
    {
        return response()->json($job->load(['category', 'skills', 'client', 'currency']));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'job_category_id' => 'required',
            'roles_and_responsibility' => 'required',
            'skills' => 'nullable|array',
            'client_id' => 'nullable|exists:clients,id',
            'currency_id' => 'nullable|exists:currencies,id',
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

        return response()->json($job->load('skills', 'client', 'currency'));
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(null, 204);
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
