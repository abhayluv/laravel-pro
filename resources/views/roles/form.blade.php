<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $role->exists ? __('Edit Role') : __('Create Role') }}
        </h2>
    </x-slot>

    <div class="mx-auto">
        <div class="bg-gray-50 dark:bg-gray-900 shadow-sm sm:rounded-lg border border-gray-200 rounded">
            <div class="p-6 text-gray-900">
                <form method="POST" action="{{ $role->exists ? route('roles.update', $role) : route('roles.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if($role->exists)
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-md font-medium text-gray-700 mb-2">Role Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" class="w-full border rounded px-3 py-2" placeholder="e.g. admin, manager, employee, hr" required />
                            @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="slug" class="block text-md font-medium text-gray-700 mb-2">Role Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $role->slug) }}" class="w-full border rounded px-3 py-2" placeholder="e.g. admin" required />
                            @error('slug')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="icon" class="block text-md font-medium text-gray-700 mb-2">Role Icon</label>
                            <input type="file" name="icon" id="icon" accept=".jpg,.jpeg,.png,.gif" class="w-full border rounded px-3 py-2" />
                            <p class="text-xs text-gray-500 mt-1">Allowed types: jpg, jpeg, png, gif. Example size: 64x64 or 128x128.</p>
                            @if($role->icon_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$role->icon_path) }}" class="h-16 w-16 rounded" alt="icon preview" />
                                </div>
                            @endif
                            @error('icon')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-700 mb-2">Role Status</label>
                            <div class="flex flex-wrap">
                                <div class="flex items-center">
                                    <input id="green-radio" type="radio" value="" name="status" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @checked(old('status', $role->status ? '1' : '0')==='1')>
                                    <label for="green-radio" class="ms-2 text-md font-medium text-gray-900 dark:text-gray-300">Active</label>
                                </div>
                                <div class="flex items-center ms-2">
                                    <input id="red-radio" type="radio" value="0" name="status" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @checked(old('status', $role->status ? '1' : '0')==='0')>
                                    <label for="red-radio" class="ms-2 text-md font-medium text-gray-900 dark:text-gray-300">Disable</label>
                                </div>
                            </div>


                            <p class="text-xs text-gray-500 mt-1">If disabled, users with this role cannot login.</p>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('roles.index') }}" class="px-4 py-2 bg-white border border-gray-200 rounded">Cancel</a>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded">{{ $role->exists ? 'Update' : 'Create' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


