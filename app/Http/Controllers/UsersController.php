<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('users.form', ['user' => new User(), 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'phone' => ['required','string','max:30'],
            'gender' => ['required', Rule::in(['1','2','3'])],
            'date_of_birth' => ['required','date'],
            'password' => ['required','confirmed','min:8'],
            'address' => ['required','string'],
            'role_id' => ['required','exists:roles,id'],
            'icon' => ['nullable','file','mimes:jpg,jpeg,png,gif'],
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('user-icons', 'public');
        }

        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->name = $data['first_name'].' '.$data['last_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->gender = (int)$data['gender'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->address = $data['address'];
        $user->role_id = (int)$data['role_id'];
        $user->icon_path = $iconPath;
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('settings.index', ['tab' => 'users'])->with('status', 'User created');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        return view('users.form', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
            'phone' => ['required','string','max:30'],
            'gender' => ['required', Rule::in(['1','2','3'])],
            'date_of_birth' => ['required','date'],
            'password' => ['nullable','confirmed','min:8'],
            'address' => ['required','string'],
            'role_id' => ['required','exists:roles,id'],
            'icon' => ['nullable','file','mimes:jpg,jpeg,png,gif'],
        ]);

        if ($request->hasFile('icon')) {
            if ($user->icon_path) {
                Storage::disk('public')->delete($user->icon_path);
            }
            $user->icon_path = $request->file('icon')->store('user-icons', 'public');
        }

        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->name = $data['first_name'].' '.$data['last_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->gender = (int)$data['gender'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->address = $data['address'];
        $user->role_id = (int)$data['role_id'];
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return redirect()->route('settings.index', ['tab' => 'users'])->with('status', 'User updated');
    }

    public function destroy(User $user)
    {
        if ($user->icon_path) {
            Storage::disk('public')->delete($user->icon_path);
        }
        $user->delete();
        return redirect()->route('settings.index', ['tab' => 'users'])->with('status', 'User deleted');
    }
}


