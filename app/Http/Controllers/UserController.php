<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')->get();
        if ($request->wantsJson()) {
            return response()->json($users);
        }
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'roles' => 'nullable|array'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        if ($request->wantsJson()) {
            return response()->json($user->load('roles'), 201);
        }
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show(string $id)
    {
        return response()->json(User::with('roles')->findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:6',
            'roles' => 'nullable|array'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        if ($request->wantsJson()) {
            return response()->json($user->load('roles'));
        }
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if (request()->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
