<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->exists ? __('Edit User') : __('Create User') }}
        </h2>
    </x-slot>

    <div class="mx-auto">
        <div class="bg-gray-50 dark:bg-gray-900 shadow-sm sm:rounded-lg border border-gray-200 rounded">
            <div class="p-6 text-gray-900">
                <form method="POST" action="{{ $user->exists ? route('users.update', $user) : route('users.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if($user->exists)
                        @method('PUT')
                    @endif

                    <div>
                        <label for="icon" class="block text-md font-medium text-gray-700 mb-2">User Icon</label>
                        <input type="file" name="icon" id="icon" accept=".jpg,.jpeg,.png,.gif" class="w-full border rounded px-3 py-2" />
                        <p class="text-xs text-gray-500 mt-1">Allowed types: jpg, jpeg, png, gif. Example size: 128x128.</p>
                        @if($user->icon_path)
                            <div class="mt-2"><img src="{{ asset('storage/'.$user->icon_path) }}" class="h-16 w-16 rounded" alt="icon" /></div>
                        @endif
                        @error('icon')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="role_id" class="block text-md font-medium text-gray-700 mb-2">User Role</label>
                        <select name="role_id" id="role_id" class="w-full border rounded px-3 py-2" required>
                            <option value="">Select role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @selected((int)old('role_id', $user->role_id) === $role->id)>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-md font-medium text-gray-700 mb-2">User First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" class="w-full border rounded px-3 py-2" required />
                            @error('first_name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="last_name" class="block text-md font-medium text-gray-700 mb-2">User Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" class="w-full border rounded px-3 py-2" required />
                            @error('last_name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="block text-md font-medium text-gray-700 mb-2">User Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2" required />
                            @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-md font-medium text-gray-700 mb-2">User Phone Number</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="w-full border rounded px-3 py-2" required />
                            @error('phone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="gender" class="block text-md font-medium text-gray-700 mb-2">User Gender</label>
                            <select name="gender" id="gender" class="w-full border rounded px-3 py-2" required>
                                <option value="">Select gender</option>
                                <option value="1" @selected(old('gender', (string)$user->gender)==='1')>Male</option>
                                <option value="2" @selected(old('gender', (string)$user->gender)==='2')>Female</option>
                                <option value="3" @selected(old('gender', (string)$user->gender)==='3')>Other</option>
                            </select>
                            @error('gender')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="date_of_birth" class="block text-md font-medium text-gray-700 mb-2">User Date of Birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" class="w-full border rounded px-3 py-2" required />
                            @error('date_of_birth')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-md font-medium text-gray-700 mb-2">User Password</label>
                            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" @if(!$user->exists) required @endif />
                            @error('password')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-md font-medium text-gray-700 mb-2">User Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded px-3 py-2" @if(!$user->exists) required @endif />
                        </div>
                    </div>

                    <div>
                        <label for="address" class="block text-md font-medium text-gray-700 mb-2">User Address</label>
                        <textarea name="address" id="address" class="w-full border rounded px-3 py-2" rows="3" required>{{ old('address', $user->address) }}</textarea>
                        @error('address')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-md font-medium text-gray-700 mb-2">Permissions</label>
                        <p class="text-xs text-gray-500 mb-3">Permission toggles coming soon (policies/gates wiring). Current build collects core user data and role.</p>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('users.index') }}" class="px-4 py-2 border rounded">Cancel</a>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded">{{ $user->exists ? 'Update' : 'Create' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


