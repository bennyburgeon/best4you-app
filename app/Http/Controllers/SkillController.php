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

        return Skill::create($validated);
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|unique:skills,name,' . $skill->id
        ]);

        $skill->update($validated);
        return $skill;
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Skill deleted']);
    }
}
