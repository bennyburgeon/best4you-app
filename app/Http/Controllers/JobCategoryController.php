<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = JobCategory::with('parent')->get();
        if ($request->wantsJson()) {
            return response()->json($categories);
        }
        $parentCategories = JobCategory::whereNull('parent_category_id')->get();
        return view('admin.categories.index', compact('categories', 'parentCategories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category = JobCategory::create($request->only('name', 'parent_category_id'));
        return response()->json($category, 201);
    }

    public function show(JobCategory $jobCategory)
    {
        return response()->json($jobCategory->load('parent'));
    }

    public function update(Request $request, JobCategory $jobCategory)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $jobCategory->update($request->only('name', 'parent_category_id'));
        return response()->json($jobCategory);
    }

    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();
        return response()->json(null, 204);
    }
}
