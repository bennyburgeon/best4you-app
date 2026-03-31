<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
        return response()->json(Currency::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'symbol' => 'required|string|max:10'
        ]);

        $currency = Currency::create($data);
        return response()->json($currency, 201);
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
        return response()->json($currency);
    }

    public function destroy(string $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();
        return response()->json(null, 204);
    }
}
