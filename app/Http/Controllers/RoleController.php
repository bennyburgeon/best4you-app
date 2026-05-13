<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::with('permissions')->get();
        if ($request->wantsJson()) {
            return response()->json($roles);
        }
        $permissions = Permission::all();
        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array'
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        if ($request->wantsJson()) {
            return response()->json($role->load('permissions'), 201);
        }
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function show(string $id)
    {
        return response()->json(Role::with('permissions')->findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id,
            'permissions' => 'nullable|array'
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        if ($request->wantsJson()) {
            return response()->json($role->load('permissions'));
        }
        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        if (request()->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}
