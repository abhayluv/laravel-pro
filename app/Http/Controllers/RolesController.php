<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $view = $request->query('view', 'grid'); // grid|list
        $search = $request->query('search');
        $status = $request->query('status'); // 1|0|null

        $query = Role::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }
        if ($status !== null && $status !== '') {
            $query->where('status', (bool) $status);
        }

        $roles = $query->latest()->paginate(12)->withQueryString();

        return view('roles.index', compact('roles', 'view', 'search', 'status'));
    }

    public function create()
    {
        return view('roles.form', ['role' => new Role()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:roles,slug'],
            'icon' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif'],
            'status' => ['nullable', Rule::in(['0','1'])],
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('role-icons', 'public');
        }

        $role = Role::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'icon_path' => $iconPath,
            'status' => ($data['status'] ?? '1') === '1',
        ]);

        return redirect()->route('settings.index', ['tab' => 'roles'])->with('status', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        return view('roles.form', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('roles', 'slug')->ignore($role->id)],
            'icon' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif'],
            'status' => ['nullable', Rule::in(['0','1'])],
        ]);

        if ($request->hasFile('icon')) {
            if ($role->icon_path) {
                Storage::disk('public')->delete($role->icon_path);
            }
            $role->icon_path = $request->file('icon')->store('role-icons', 'public');
        }

        $role->name = $data['name'];
        $role->slug = $data['slug'];
        $role->status = ($data['status'] ?? '1') === '1';
        $role->save();

        return redirect()->route('settings.index', ['tab' => 'roles'])->with('status', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        if ($role->icon_path) {
            Storage::disk('public')->delete($role->icon_path);
        }
        $role->delete();
        return redirect()->route('roles.index')->with('status', 'Role deleted');
    }

    public function toggleStatus(Request $request, Role $role)
    {
        $request->validate([
            'status' => 'required|boolean'
        ]);

        $role->status = $request->status;
        $role->save();

        return response()->json([
            'success' => true,
            'status' => $role->status
        ]);
    }
}


