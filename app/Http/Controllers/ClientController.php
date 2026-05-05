<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::all());
    }

    public function store(Request $request)
    {
        $request->merge([
            'verified' => filter_var($request->verified, FILTER_VALIDATE_BOOLEAN)
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'verified' => 'boolean',
            'contact_number' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'hr_name' => 'nullable|string|max:255',
            'hr_contact' => 'nullable|string',
            'hr_email' => 'nullable|email'
        ]);

        $data = $request->except('logo');

        $client = Client::create($data);

        if ($request->hasFile('logo')) {
            $client->addMediaFromRequest('logo')->toMediaCollection('logo', 's3');
        }

        if ($request->wantsJson()) {
            return response()->json($client, 201);
        }

        return redirect()->route('clients.index')->with('success', 'Client created successfully');
    }

    public function show(Client $client)
    {
        return response()->json($client);
    }

    // Since we are using FormData in Vue, PUT requests with files might be tricky.
    // It's common to handle it using POST with _method=PUT.
    public function update(Request $request, Client $client)
    {
        $request->merge([
            'verified' => filter_var($request->verified, FILTER_VALIDATE_BOOLEAN)
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'verified' => 'boolean',
            'contact_number' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'hr_name' => 'nullable|string|max:255',
            'hr_contact' => 'nullable|string',
            'hr_email' => 'nullable|email'
        ]);

        $data = $request->except('logo');
        $client->update($data);

        if ($request->hasFile('logo')) {
            $client->clearMediaCollection('logo');
            $client->addMediaFromRequest('logo')->toMediaCollection('logo', 's3');
        } elseif ($request->input('remove_logo')) {
            $client->clearMediaCollection('logo');
        }

        if ($request->wantsJson()) {
            return response()->json($client);
        }

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        $client->clearMediaCollection('logo');
        $client->delete();
        return response()->json(null, 204);
    }
}
