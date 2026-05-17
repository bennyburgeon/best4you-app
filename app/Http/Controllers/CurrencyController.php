<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
        return view('admin.currencies.index', ['items' => Currency::all()]);
    }

    
    public function create()
    {
        return view('admin.currencies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'symbol' => 'required|string|max:10'
        ]);

        $currency = Currency::create($data);
        return redirect()->route('currencies.index')->with('success', 'Created successfully!');
    }

    public function show(string $id)
    {
        $currency = Currency::findOrFail($id);
        return redirect()->route('currencies.index')->with('success', 'Updated successfully!');
    }

    
    public function edit(Currency $currency)
    {
        return view('admin.currencies.edit', ['item' => $currency]);
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
        return redirect()->route('currencies.index')->with('success', 'Updated successfully!');
    }

    public function destroy(string $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();
        return redirect()->route('currencies.index')->with('success', 'Updated successfully!');
    }
}
