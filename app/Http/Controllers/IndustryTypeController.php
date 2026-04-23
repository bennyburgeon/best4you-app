<?php

namespace App\Http\Controllers;

use App\Models\IndustryType;
use Illuminate\Http\Request;

class IndustryTypeController extends Controller
{
    public function index()
    {
        return response()->json(IndustryType::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:industry_types'
        ]);

        $industryType = IndustryType::create($request->all());

        return response()->json($industryType, 201);
    }

    public function show(IndustryType $industryType)
    {
        return response()->json($industryType);
    }

    public function update(Request $request, IndustryType $industryType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:industry_types,name,' . $industryType->id
        ]);

        $industryType->update($request->all());

        return response()->json($industryType);
    }

    public function destroy(IndustryType $industryType)
    {
        $industryType->delete();
        return response()->json(null, 204);
    }
}
