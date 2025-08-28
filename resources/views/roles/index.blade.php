<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-4">
                    <form method="GET" class="flex gap-2">
                        <input type="hidden" name="view" value="{{ $view }}" />
                        <input type="text" name="search" value="{{ $search }}" placeholder="Search name or slug" class="border rounded px-3 py-2" />
                        <select name="status" class="border rounded px-3 py-2">
                            <option value="">All Status</option>
                            <option value="1" @selected($status==='1')>Active</option>
                            <option value="0" @selected($status==='0')>Disabled</option>
                        </select>
                        <button class="px-3 py-2 bg-gray-800 text-white rounded">Filter</button>
                    </form>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('roles.index', array_merge(request()->except('view'), ['view' => 'grid'])) }}" class="px-2 py-1 border rounded {{ $view==='grid' ? 'bg-gray-100' : '' }}">Grid</a>
                        <a href="{{ route('roles.index', array_merge(request()->except('view'), ['view' => 'list'])) }}" class="px-2 py-1 border rounded {{ $view==='list' ? 'bg-gray-100' : '' }}">List</a>
                        <a href="{{ route('roles.create') }}" class="px-3 py-2 bg-indigo-600 text-white rounded">+ New Role</a>
                    </div>
                </div>

                @if($view === 'list')
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($roles as $role)
                                    <tr>
                                        <td class="px-4 py-2">
                                            @if($role->icon_path)
                                                <img src="{{ asset('storage/'.$role->icon_path) }}" class="h-8 w-8 rounded" alt="icon" />
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $role->name }}</td>
                                        <td class="px-4 py-2">{{ $role->slug }}</td>
                                        <td class="px-4 py-2">
                                            <span class="inline-flex items-center px-2 py-1 text-xs rounded {{ $role->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                                {{ $role->status ? 'Active' : 'Disabled' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('roles.edit', $role) }}" class="text-indigo-600 hover:underline mr-3">Edit</a>
                                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:underline" onclick="return confirm('Delete this role?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">No roles found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($roles as $role)
                            <div class="border rounded p-4 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    @if($role->icon_path)
                                        <img src="{{ asset('storage/'.$role->icon_path) }}" class="h-10 w-10 rounded" alt="icon" />
                                    @else
                                        <div class="h-10 w-10 rounded bg-gray-100"></div>
                                    @endif
                                    <div>
                                        <div class="font-semibold">{{ $role->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $role->slug }}</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="mb-2">
                                        <span class="inline-flex items-center px-2 py-1 text-xs rounded {{ $role->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ $role->status ? 'Active' : 'Disabled' }}
                                        </span>
                                    </div>
                                    <div class="space-x-3">
                                        <a href="{{ route('roles.edit', $role) }}" class="text-indigo-600 hover:underline">Edit</a>
                                        <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:underline" onclick="return confirm('Delete this role?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-sm text-gray-500 py-6">No roles found.</div>
                        @endforelse
                    </div>
                @endif

                <div class="mt-4">{{ $roles->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>


