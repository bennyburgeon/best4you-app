<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = JobApplication::with(['job', 'job.category'])->latest();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->has('job_id') && $request->job_id != '') {
            $query->where('job_id', $request->job_id);
        }

        if ($request->has('category_id') && $request->category_id != '') {
            $query->whereHas('job', function($q) use ($request) {
                $q->where('job_category_id', $request->category_id);
            });
        }

        $applications = $query->get();
        if ($request->wantsJson()) {
            return response()->json($applications);
        }
        return view('admin.applications.index', compact('applications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'nullable|exists:jobs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // 10MB
        ]);

        $data = $request->except('resume');
        
        $application = JobApplication::create($data);

        if ($request->hasFile('resume')) {
            $application->addMediaFromRequest('resume')->toMediaCollection('resume');
        }

        if ($request->wantsJson()) {
            return response()->json($application, 201);
        }

        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }

    public function destroy(JobApplication $jobApplication)
    {
        $jobApplication->clearMediaCollection('resume');
        $jobApplication->delete();
        if (request()->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->back()->with('success', 'Application deleted successfully');
    }
}
