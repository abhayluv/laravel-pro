<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Master Form Details') }}
        </h2>
    </x-slot>

    <div class="mx-auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-medium text-gray-900">{{ $masterForm->full_name }}</h3>
                    <div class="flex space-x-3">
                        <a href="{{ route('master-forms.edit', $masterForm) }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Edit
                        </a>
                        <a href="{{ route('master-forms.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded hover:bg-gray-50">
                            Back to List
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Basic Information</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Full Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->full_name }}</p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->email }}</p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Phone Number</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->phone_number }}</p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Gender</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->gender_text }}</p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Status</label>
                            <span class="inline-flex items-center px-2 py-1 text-xs rounded {{ $masterForm->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $masterForm->status_text }}
                            </span>
                        </div>
                    </div>

                    <!-- Selections and Languages -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Selections & Languages</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Single Selection</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $masterForm->single_selection ? 'Option ' . $masterForm->single_selection : 'Not selected' }}
                            </p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Multi Selection</label>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($masterForm->multi_selection && count($masterForm->multi_selection) > 0)
                                    @foreach($masterForm->multi_selection as $selection)
                                        <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded mr-1 mb-1">
                                            Multi Option {{ $selection }}
                                        </span>
                                    @endforeach
                                @else
                                    No selections
                                @endif
                            </p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Languages</label>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($masterForm->languages && count($masterForm->languages) > 0)
                                    @foreach($masterForm->languages as $language)
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1 mb-1">
                                            {{ $language }}
                                        </span>
                                    @endforeach
                                @else
                                    No languages selected
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Media Files -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Media Files</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Profile Image</label>
                            @if($masterForm->image_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$masterForm->image_path) }}" class="h-32 w-32 object-cover rounded border" alt="Profile image">
                                </div>
                            @else
                                <p class="mt-1 text-sm text-gray-500">No image uploaded</p>
                            @endif
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Video</label>
                            @if($masterForm->video_path)
                                <div class="mt-2">
                                    <video class="h-32 w-full object-cover rounded border" controls>
                                        <source src="{{ asset('storage/'.$masterForm->video_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @else
                                <p class="mt-1 text-sm text-gray-500">No video uploaded</p>
                            @endif
                        </div>
                    </div>

                    <!-- Dates and Times -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Dates & Times</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Date</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->date_field ? $masterForm->date_field->format('F j, Y') : 'Not set' }}</p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Time</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->time_field ? $masterForm->time_field->format('g:i A') : 'Not set' }}</p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Date & Time</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->datetime_field ? $masterForm->datetime_field->format('F j, Y g:i A') : 'Not set' }}</p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Date Range</label>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($masterForm->date_range_start && $masterForm->date_range_end)
                                    {{ $masterForm->date_range_start->format('F j, Y') }} to {{ $masterForm->date_range_end->format('F j, Y') }}
                                @else
                                    Not set
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Ratings and Sliders -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Ratings & Sliders</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Range Slider Value</label>
                            <div class="mt-2">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ $masterForm->range_slider_value }}%"></div>
                                </div>
                                <p class="mt-1 text-sm text-gray-600">{{ $masterForm->range_slider_value }}%</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Star Rating</label>
                            <div class="mt-2 flex space-x-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-6 h-6 {{ $i <= $masterForm->star_rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                                <span class="ml-2 text-sm text-gray-600">({{ $masterForm->star_rating }}/5)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Address</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Address</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->address ?: 'No address provided' }}</p>
                        </div>
                    </div>

                    <!-- Signature -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Signature</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Digital Signature</label>
                            @if($masterForm->signature)
                                <div class="mt-2">
                                    <img src="{{ $masterForm->signature }}" class="border border-gray-300 rounded" alt="Digital signature">
                                </div>
                            @else
                                <p class="mt-1 text-sm text-gray-500">No signature provided</p>
                            @endif
                        </div>
                    </div>

                    <!-- Text Editor Content -->
                    <div class="space-y-4 md:col-span-2">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Text Editor Content</h4>
                        
                                                 <div>
                             <label class="block text-md font-medium text-gray-500">Content</label>
                             <div class="mt-2 p-4 bg-gray-50 rounded border">
                                 @if($masterForm->text_editor)
                                     {!! $masterForm->text_editor !!}
                                 @else
                                     <p class="text-gray-500">No content provided</p>
                                 @endif
                             </div>
                         </div>
                    </div>

                    <!-- Captcha -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Captcha</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Captcha Code</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->captcha ?: 'Not provided' }}</p>
                        </div>
                    </div>

                    <!-- Timestamps -->
                    <div class="space-y-4">
                        <h4 class="text-md font-medium text-gray-900 border-b pb-2">Timestamps</h4>
                        
                        <div>
                            <label class="block text-md font-medium text-gray-500">Created At</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->created_at->format('F j, Y g:i A') }}</p>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-500">Last Updated</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $masterForm->updated_at->format('F j, Y g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
