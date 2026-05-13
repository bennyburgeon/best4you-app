<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $skills = Skill::all();
        if ($request->wantsJson()) {
            return response()->json($skills);
        }
        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:skills,name'
        ]);

        $skill = Skill::create($validated);
        if ($request->wantsJson()) {
            return response()->json($skill, 201);
        }
        return redirect()->route('skills.index')->with('success', 'Skill created successfully');
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|unique:skills,name,' . $skill->id
        ]);

        $skill->update($validated);
        if ($request->wantsJson()) {
            return response()->json($skill);
        }
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Skill deleted']);
        }
        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully');
    }
}
