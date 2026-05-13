<?php

namespace App\Http\Controllers;

use App\Models\IndustryType;
use Illuminate\Http\Request;

class IndustryTypeController extends Controller
{
    public function index(\App\DataTables\IndustryTypeDataTable $dataTable)
    {
        return $dataTable->render('admin.industry_types.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:industry_types'
        ]);

        $industryType = IndustryType::create($request->all());

        if ($request->wantsJson()) {
            return response()->json($industryType, 201);
        }
        return redirect()->route('industry-types.index')->with('success', 'Industry type created successfully');
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

        if ($request->wantsJson()) {
            return response()->json($industryType);
        }
        return redirect()->route('industry-types.index')->with('success', 'Industry type updated successfully');
    }

    public function destroy(IndustryType $industryType)
    {
        $industryType->delete();
        if (request()->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('industry-types.index')->with('success', 'Industry type deleted successfully');
    }
}
