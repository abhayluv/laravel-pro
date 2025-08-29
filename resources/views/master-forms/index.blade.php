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
                        <button class="px-3 py-2 bg-gray-500 text-white rounded flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filter
                        </button>
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
                                            <div class="flex items-center">
                                                <button type="button" class="status-toggle relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 {{ $form->status ? 'bg-blue-600' : 'bg-gray-200' }}" data-id="{{ $form->id }}" role="switch" aria-checked="{{ $form->status ? 'true' : 'false' }}">
                                                    <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $form->status ? 'translate-x-5' : 'translate-x-0' }}"></span>
                                                </button>
                                                <span class="ml-3 text-sm font-medium text-gray-900">{{ $form->status_text }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="flex items-center gap-3">
                                                <a href="{{ route('master-forms.show', $form) }}" class="w-8 h-8 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 transition-colors flex items-center justify-center" title="View">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('master-forms.edit', $form) }}" class="w-8 h-8 bg-yellow-100 text-yellow-600 rounded hover:bg-yellow-200 transition-colors flex items-center justify-center" title="Edit">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('master-forms.destroy', $form) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="w-8 h-8 bg-red-100 text-red-600 rounded hover:bg-red-200 transition-colors flex items-center justify-center" onclick="return confirm('Delete this master form?')" title="Delete">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
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
                                        <div class="flex items-center">
                                            <button type="button" class="status-toggle relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 {{ $form->status ? 'bg-blue-600' : 'bg-gray-200' }}" data-id="{{ $form->id }}" role="switch" aria-checked="{{ $form->status ? 'true' : 'false' }}">
                                                <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $form->status ? 'translate-x-5' : 'translate-x-0' }}"></span>
                                            </button>
                                            <span class="ml-3 text-sm font-medium text-gray-900">{{ $form->status_text }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('master-forms.show', $form) }}" class="w-8 h-8 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 transition-colors flex items-center justify-center" title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('master-forms.edit', $form) }}" class="w-8 h-8 bg-yellow-100 text-yellow-600 rounded hover:bg-yellow-200 transition-colors flex items-center justify-center" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('master-forms.destroy', $form) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="w-8 h-8 bg-red-100 text-red-600 rounded hover:bg-red-200 transition-colors flex items-center justify-center" onclick="return confirm('Delete this master form?')" title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
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
            document.querySelectorAll('.status-toggle').forEach(function(button) {
                button.addEventListener('click', function() {
                    const formId = this.dataset.id;
                    const isCurrentlyActive = this.getAttribute('aria-checked') === 'true';
                    const newStatus = !isCurrentlyActive;
                    
                    // Update the button appearance immediately for better UX
                    this.setAttribute('aria-checked', newStatus.toString());
                    this.classList.toggle('bg-blue-600', newStatus);
                    this.classList.toggle('bg-gray-200', !newStatus);
                    this.querySelector('span').classList.toggle('translate-x-5', newStatus);
                    this.querySelector('span').classList.toggle('translate-x-0', !newStatus);
                    
                    fetch(`/master-forms/${formId}/toggle-status`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            status: newStatus
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the status text
                            // const statusText = this.parentElement.querySelector('span:last-child');
                            // statusText.textContent = data.status ? 'Active' : 'Disabled';
                            const statusText = $(this).parent('.flex').find('span').last();
                            statusText.text(data.status ? 'Active' : 'Disabled');
                        } else {
                            // Revert the toggle if failed
                            this.setAttribute('aria-checked', isCurrentlyActive.toString());
                            this.classList.toggle('bg-blue-600', isCurrentlyActive);
                            this.classList.toggle('bg-gray-200', !isCurrentlyActive);
                            this.querySelector('span').classList.toggle('translate-x-5', isCurrentlyActive);
                            this.querySelector('span').classList.toggle('translate-x-0', !isCurrentlyActive);
                            alert('Failed to update status');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Revert the toggle if failed
                        this.setAttribute('aria-checked', isCurrentlyActive.toString());
                        this.classList.toggle('bg-blue-600', isCurrentlyActive);
                        this.classList.toggle('bg-gray-200', !isCurrentlyActive);
                        this.querySelector('span').classList.toggle('translate-x-5', isCurrentlyActive);
                        this.querySelector('span').classList.toggle('translate-x-0', !isCurrentlyActive);
                        alert('Failed to update status');
                    });
                });
            });
        });
    </script>
    @endpush
</x-app-layout>
