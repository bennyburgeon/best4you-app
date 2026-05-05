<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $currencies = Currency::all();
        if ($request->wantsJson()) {
            return response()->json($currencies);
        }
        return view('admin.currencies.index', compact('currencies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'symbol' => 'required|string|max:10'
        ]);

        $currency = Currency::create($data);
        if ($request->wantsJson()) {
            return response()->json($currency, 201);
        }
        return redirect()->route('currencies.index')->with('success', 'Currency created successfully');
    }

    public function show(string $id)
    {
        $currency = Currency::findOrFail($id);
        return response()->json($currency);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'symbol' => 'required|string|max:10'
        ]);

        $currency = Currency::findOrFail($id);
        $currency->update($data);
        if ($request->wantsJson()) {
            return response()->json($currency);
        }
        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully');
    }

    public function destroy(string $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();
        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('currencies.index')->with('success', 'Currency deleted successfully');
    }
}
