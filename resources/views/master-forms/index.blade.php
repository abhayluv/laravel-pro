<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Master Form') }}
        </h2>
    </x-slot>

    <div class="mx-auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-4">
                    <form method="GET" class="flex gap-2">
                        <input type="hidden" name="view" value="{{ $view }}" />
                        <input type="text" name="search" value="{{ $search }}" placeholder="Search name, email or phone" class="border rounded px-3 py-2" />
                        <select name="status" class="border rounded px-3 py-2">
                            <option value="">All Status</option>
                            <option value="1" @selected(($status ?? '')==='1')>Active</option>
                            <option value="0" @selected(($status ?? '')==='0')>Disabled</option>
                        </select>
                        <button class="px-3 py-2 bg-gray-500 text-white rounded">Filter</button>
                        <a href="{{ route('master-forms.index') }}" class="px-3 py-2 border border-gray-300 text-gray-700 rounded">Reset</a>
                    </form>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('master-forms.index', array_merge(request()->except('view'), ['view' => 'grid'])) }}" class="px-2 py-1 border rounded {{ $view==='grid' ? 'bg-gray-100' : '' }}">Grid</a>
                        <a href="{{ route('master-forms.index', array_merge(request()->except('view'), ['view' => 'list'])) }}" class="px-2 py-1 border rounded {{ $view==='list' ? 'bg-gray-100' : '' }}">List</a>
                        <a href="{{ route('master-forms.create') }}" class="px-3 py-2 bg-indigo-600 text-white rounded">+ New Master Form</a>
                    </div>
                </div>

                @if(($view ?? 'grid') === 'list')
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($masterForms as $form)
                                    <tr>
                                        <td class="px-4 py-2">
                                            @if($form->image_path)
                                                <img src="{{ asset('storage/'.$form->image_path) }}" class="h-8 w-8 rounded object-cover" alt="profile" />
                                            @else
                                                <div class="h-8 w-8 rounded bg-gray-100 flex items-center justify-center">
                                                    <svg class="h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $form->full_name }}</td>
                                        <td class="px-4 py-2">{{ $form->email }}</td>
                                        <td class="px-4 py-2">{{ $form->phone_number }}</td>
                                        <td class="px-4 py-2">{{ $form->gender_text }}</td>
                                        <td class="px-4 py-2">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer status-toggle" data-id="{{ $form->id }}" {{ $form->status ? 'checked' : '' }}>
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                                <span class="ml-3 text-sm font-medium text-gray-900">{{ $form->status_text }}</span>
                                            </label>
                                        </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('master-forms.show', $form) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mr-2">View</a>
                                            <a href="{{ route('master-forms.edit', $form) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mr-2">Edit</a>
                                            <form action="{{ route('master-forms.destroy', $form) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200" onclick="return confirm('Delete this master form?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="7" class="px-4 py-6 text-center text-sm text-gray-500">No master forms found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($masterForms as $form)
                            <div class="border rounded p-4">
                                <div class="flex items-center gap-3 mb-3">
                                    @if($form->image_path)
                                        <img src="{{ asset('storage/'.$form->image_path) }}" class="h-12 w-12 rounded object-cover" alt="profile" />
                                    @else
                                        <div class="h-12 w-12 rounded bg-gray-100 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <div class="font-semibold">{{ $form->full_name }}</div>
                                        <div class="text-xs text-gray-500">{{ $form->email }}</div>
                                    </div>
                                </div>
                                
                                <div class="space-y-2 mb-3">
                                    <div class="text-sm">
                                        <span class="text-gray-500">Phone:</span> {{ $form->phone_number }}
                                    </div>
                                    <div class="text-sm">
                                        <span class="text-gray-500">Gender:</span> {{ $form->gender_text }}
                                    </div>
                                    @if($form->languages)
                                        <div class="text-sm">
                                            <span class="text-gray-500">Languages:</span> {{ implode(', ', $form->languages) }}
                                        </div>
                                    @endif
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer status-toggle" data-id="{{ $form->id }}" {{ $form->status ? 'checked' : '' }}>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-900">{{ $form->status_text }}</span>
                                        </label>
                                    </div>
                                    <div class="space-x-2">
                                        <a href="{{ route('master-forms.show', $form) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">View</a>
                                        <a href="{{ route('master-forms.edit', $form) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Edit</a>
                                        <form action="{{ route('master-forms.destroy', $form) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200" onclick="return confirm('Delete this master form?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-sm text-gray-500 py-6">No master forms found.</div>
                        @endforelse
                    </div>
                @endif

                <div class="mt-4">{{ $masterForms->links() }}</div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Status toggle functionality
            document.querySelectorAll('.status-toggle').forEach(function(toggle) {
                toggle.addEventListener('change', function() {
                    const formId = this.dataset.id;
                    const isChecked = this.checked;
                    
                    fetch(`/master-forms/${formId}/toggle-status`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            status: isChecked
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the status text
                            const statusText = this.parentElement.querySelector('span');
                            statusText.textContent = data.status ? 'Active' : 'Disabled';
                        } else {
                            // Revert the toggle if failed
                            this.checked = !isChecked;
                            alert('Failed to update status');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        this.checked = !isChecked;
                        alert('Failed to update status');
                    });
                });
            });
        });
    </script>
    @endpush
</x-app-layout>
