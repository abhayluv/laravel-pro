<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configurations') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <div class="space-y-6">
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">{{ __('Customize your application appearance and branding.') }}</p>
                        </div>

                        <form action="{{ route('configurations.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                            
                            <!-- Basic Settings -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Basic Settings</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="logo" class="block text-md font-medium text-gray-700 mb-2">Logo</label>
                                        <input type="file" name="logo" id="logo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                        @if($configuration->logo_path)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/'.$configuration->logo_path) }}" alt="Current Logo" class="h-12 w-auto">
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="favicon" class="block text-md font-medium text-gray-700 mb-2">Favicon</label>
                                        <input type="file" name="favicon" id="favicon" accept=".ico,image/png" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                        @if($configuration->favicon_path)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/'.$configuration->favicon_path) }}" alt="Current Favicon" class="h-8 w-8">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Global Design -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Global Design</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="background_color" class="block text-md font-medium text-gray-700 mb-2">Background Color</label>
                                        <input type="color" name="background_color" id="background_color" value="{{ $configuration->background_color }}" class="block w-full h-10 rounded border-gray-300">
                                    </div>
                                    <div>
                                        <label for="text_color" class="block text-md font-medium text-gray-700 mb-2">Text Color</label>
                                        <input type="color" name="text_color" id="text_color" value="{{ $configuration->text_color }}" class="block w-full h-10 rounded border-gray-300">
                                    </div>
                                    <div>
                                        <label for="font_style" class="block text-md font-medium text-gray-700 mb-2">Font Style</label>
                                        <select name="font_style" id="font_style" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="Arial, sans-serif" {{ $configuration->font_style == 'Arial, sans-serif' ? 'selected' : '' }}>Arial</option>
                                            <option value="Helvetica, sans-serif" {{ $configuration->font_style == 'Helvetica, sans-serif' ? 'selected' : '' }}>Helvetica</option>
                                            <option value="Times New Roman, serif" {{ $configuration->font_style == 'Times New Roman, serif' ? 'selected' : '' }}>Times New Roman</option>
                                            <option value="Georgia, serif" {{ $configuration->font_style == 'Georgia, serif' ? 'selected' : '' }}>Georgia</option>
                                            <option value="Verdana, sans-serif" {{ $configuration->font_style == 'Verdana, sans-serif' ? 'selected' : '' }}>Verdana</option>
                                            <option value="Courier New, monospace" {{ $configuration->font_style == 'Courier New, monospace' ? 'selected' : '' }}>Courier New</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar Design -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Sidebar Design</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                    <div>
                                        <label for="sidebar_background_color" class="block text-md font-medium text-gray-700 mb-2">Background Color</label>
                                        <input type="color" name="sidebar_background_color" id="sidebar_background_color" value="{{ $configuration->sidebar_background_color }}" class="block w-full h-10 rounded border-gray-300">
                                    </div>
                                    <div>
                                        <label for="sidebar_text_color" class="block text-md font-medium text-gray-700 mb-2">Text Color</label>
                                        <input type="color" name="sidebar_text_color" id="sidebar_text_color" value="{{ $configuration->sidebar_text_color }}" class="block w-full h-10 rounded border-gray-300">
                                    </div>
                                    <div>
                                        <label for="sidebar_font_size" class="block text-md font-medium text-gray-700 mb-2">Font Size</label>
                                        <input type="text" name="sidebar_font_size" id="sidebar_font_size" value="{{ $configuration->sidebar_font_size }}" placeholder="14px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="sidebar_font_weight" class="block text-md font-medium text-gray-700 mb-2">Font Weight</label>
                                        <select name="sidebar_font_weight" id="sidebar_font_weight" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="normal" {{ $configuration->sidebar_font_weight == 'normal' ? 'selected' : '' }}>Normal</option>
                                            <option value="bold" {{ $configuration->sidebar_font_weight == 'bold' ? 'selected' : '' }}>Bold</option>
                                            <option value="lighter" {{ $configuration->sidebar_font_weight == 'lighter' ? 'selected' : '' }}>Lighter</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="sidebar_line_height" class="block text-md font-medium text-gray-700 mb-2">Line Height</label>
                                        <input type="text" name="sidebar_line_height" id="sidebar_line_height" value="{{ $configuration->sidebar_line_height }}" placeholder="1.5" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="sidebar_border" class="block text-md font-medium text-gray-700 mb-2">Border</label>
                                        <input type="text" name="sidebar_border" id="sidebar_border" value="{{ $configuration->sidebar_border }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="sidebar_border_radius" class="block text-md font-medium text-gray-700 mb-2">Border Radius</label>
                                        <input type="text" name="sidebar_border_radius" id="sidebar_border_radius" value="{{ $configuration->sidebar_border_radius }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="sidebar_box_shadow" class="block text-md font-medium text-gray-700 mb-2">Box Shadow</label>
                                        <input type="text" name="sidebar_box_shadow" id="sidebar_box_shadow" value="{{ $configuration->sidebar_box_shadow }}" placeholder="none" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="sidebar_padding" class="block text-md font-medium text-gray-700 mb-2">Padding</label>
                                        <input type="text" name="sidebar_padding" id="sidebar_padding" value="{{ $configuration->sidebar_padding }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="sidebar_margin" class="block text-md font-medium text-gray-700 mb-2">Margin</label>
                                        <input type="text" name="sidebar_margin" id="sidebar_margin" value="{{ $configuration->sidebar_margin }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Typography Design -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Typography Design</h4>
                                
                                <!-- Paragraph -->
                                <div class="mb-6">
                                    <h5 class="text-md font-medium text-gray-800 mb-3">Paragraph (p)</h5>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                        <div>
                                            <label for="paragraph_font_size" class="block text-md font-medium text-gray-700 mb-1">Font Size</label>
                                            <input type="text" name="paragraph_font_size" id="paragraph_font_size" value="{{ $configuration->paragraph_font_size }}" placeholder="16px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="paragraph_font_color" class="block text-md font-medium text-gray-700 mb-1">Font Color</label>
                                            <input type="color" name="paragraph_font_color" id="paragraph_font_color" value="{{ $configuration->paragraph_font_color }}" class="block w-full h-8 rounded border-gray-300">
                                        </div>
                                        <div>
                                            <label for="paragraph_font_hover_color" class="block text-md font-medium text-gray-700 mb-1">Hover Color</label>
                                            <input type="color" name="paragraph_font_hover_color" id="paragraph_font_hover_color" value="{{ $configuration->paragraph_font_hover_color }}" class="block w-full h-8 rounded border-gray-300">
                                        </div>
                                        <div>
                                            <label for="paragraph_font_weight" class="block text-md font-medium text-gray-700 mb-1">Font Weight</label>
                                            <select name="paragraph_font_weight" id="paragraph_font_weight" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="normal" {{ $configuration->paragraph_font_weight == 'normal' ? 'selected' : '' }}>Normal</option>
                                                <option value="bold" {{ $configuration->paragraph_font_weight == 'bold' ? 'selected' : '' }}>Bold</option>
                                                <option value="lighter" {{ $configuration->paragraph_font_weight == 'lighter' ? 'selected' : '' }}>Lighter</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="paragraph_line_height" class="block text-md font-medium text-gray-700 mb-1">Line Height</label>
                                            <input type="text" name="paragraph_line_height" id="paragraph_line_height" value="{{ $configuration->paragraph_line_height }}" placeholder="1.6" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="paragraph_background_color" class="block text-md font-medium text-gray-700 mb-1">Background Color</label>
                                            <input type="text" name="paragraph_background_color" id="paragraph_background_color" value="{{ $configuration->paragraph_background_color }}" placeholder="transparent" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="paragraph_border" class="block text-md font-medium text-gray-700 mb-1">Border</label>
                                            <input type="text" name="paragraph_border" id="paragraph_border" value="{{ $configuration->paragraph_border }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="paragraph_border_radius" class="block text-md font-medium text-gray-700 mb-1">Border Radius</label>
                                            <input type="text" name="paragraph_border_radius" id="paragraph_border_radius" value="{{ $configuration->paragraph_border_radius }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="paragraph_box_shadow" class="block text-md font-medium text-gray-700 mb-1">Box Shadow</label>
                                            <input type="text" name="paragraph_box_shadow" id="paragraph_box_shadow" value="{{ $configuration->paragraph_box_shadow }}" placeholder="none" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="paragraph_padding" class="block text-md font-medium text-gray-700 mb-1">Padding</label>
                                            <input type="text" name="paragraph_padding" id="paragraph_padding" value="{{ $configuration->paragraph_padding }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="paragraph_margin" class="block text-md font-medium text-gray-700 mb-1">Margin</label>
                                            <input type="text" name="paragraph_margin" id="paragraph_margin" value="{{ $configuration->paragraph_margin }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                    </div>
                                </div>

                                <!-- Anchor -->
                                <div class="mb-6">
                                    <h5 class="text-md font-medium text-gray-800 mb-3">Anchor (a)</h5>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                        <div>
                                            <label for="anchor_font_size" class="block text-md font-medium text-gray-700 mb-1">Font Size</label>
                                            <input type="text" name="anchor_font_size" id="anchor_font_size" value="{{ $configuration->anchor_font_size }}" placeholder="16px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="anchor_font_color" class="block text-md font-medium text-gray-700 mb-1">Font Color</label>
                                            <input type="color" name="anchor_font_color" id="anchor_font_color" value="{{ $configuration->anchor_font_color }}" class="block w-full h-8 rounded border-gray-300">
                                        </div>
                                        <div>
                                            <label for="anchor_font_hover_color" class="block text-md font-medium text-gray-700 mb-1">Hover Color</label>
                                            <input type="color" name="anchor_font_hover_color" id="anchor_font_hover_color" value="{{ $configuration->anchor_font_hover_color }}" class="block w-full h-8 rounded border-gray-300">
                                        </div>
                                        <div>
                                            <label for="anchor_font_weight" class="block text-md font-medium text-gray-700 mb-1">Font Weight</label>
                                            <select name="anchor_font_weight" id="anchor_font_weight" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="normal" {{ $configuration->anchor_font_weight == 'normal' ? 'selected' : '' }}>Normal</option>
                                                <option value="bold" {{ $configuration->anchor_font_weight == 'bold' ? 'selected' : '' }}>Bold</option>
                                                <option value="lighter" {{ $configuration->anchor_font_weight == 'lighter' ? 'selected' : '' }}>Lighter</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="anchor_line_height" class="block text-md font-medium text-gray-700 mb-1">Line Height</label>
                                            <input type="text" name="anchor_line_height" id="anchor_line_height" value="{{ $configuration->anchor_line_height }}" placeholder="1.5" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="anchor_background_color" class="block text-md font-medium text-gray-700 mb-1">Background Color</label>
                                            <input type="text" name="anchor_background_color" id="anchor_background_color" value="{{ $configuration->anchor_background_color }}" placeholder="transparent" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="anchor_border" class="block text-md font-medium text-gray-700 mb-1">Border</label>
                                            <input type="text" name="anchor_border" id="anchor_border" value="{{ $configuration->anchor_border }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="anchor_border_radius" class="block text-md font-medium text-gray-700 mb-1">Border Radius</label>
                                            <input type="text" name="anchor_border_radius" id="anchor_border_radius" value="{{ $configuration->anchor_border_radius }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="anchor_box_shadow" class="block text-md font-medium text-gray-700 mb-1">Box Shadow</label>
                                            <input type="text" name="anchor_box_shadow" id="anchor_box_shadow" value="{{ $configuration->anchor_box_shadow }}" placeholder="none" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="anchor_padding" class="block text-md font-medium text-gray-700 mb-1">Padding</label>
                                            <input type="text" name="anchor_padding" id="anchor_padding" value="{{ $configuration->anchor_padding }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="anchor_margin" class="block text-md font-medium text-gray-700 mb-1">Margin</label>
                                            <input type="text" name="anchor_margin" id="anchor_margin" value="{{ $configuration->anchor_margin }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                    </div>
                                </div>

                                <!-- Headings -->
                                @foreach(['h1', 'h2', 'h3', 'h4', 'h5', 'h6'] as $heading)
                                <div class="mb-6">
                                    <h5 class="text-md font-medium text-gray-800 mb-3">{{ strtoupper($heading) }}</h5>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                        <div>
                                            <label for="{{ $heading }}_font_size" class="block text-md font-medium text-gray-700 mb-1">Font Size</label>
                                            <input type="text" name="{{ $heading }}_font_size" id="{{ $heading }}_font_size" value="{{ $configuration->{$heading.'_font_size'} }}" placeholder="{{ $heading == 'h1' ? '32px' : ($heading == 'h2' ? '28px' : ($heading == 'h3' ? '24px' : ($heading == 'h4' ? '20px' : ($heading == 'h5' ? '18px' : '16px')))) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_font_color" class="block text-md font-medium text-gray-700 mb-1">Font Color</label>
                                            <input type="color" name="{{ $heading }}_font_color" id="{{ $heading }}_font_color" value="{{ $configuration->{$heading.'_font_color'} }}" class="block w-full h-8 rounded border-gray-300">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_font_hover_color" class="block text-md font-medium text-gray-700 mb-1">Hover Color</label>
                                            <input type="color" name="{{ $heading }}_font_hover_color" id="{{ $heading }}_font_hover_color" value="{{ $configuration->{$heading.'_font_hover_color'} }}" class="block w-full h-8 rounded border-gray-300">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_font_weight" class="block text-md font-medium text-gray-700 mb-1">Font Weight</label>
                                            <select name="{{ $heading }}_font_weight" id="{{ $heading }}_font_weight" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="normal" {{ $configuration->{$heading.'_font_weight'} == 'normal' ? 'selected' : '' }}>Normal</option>
                                                <option value="bold" {{ $configuration->{$heading.'_font_weight'} == 'bold' ? 'selected' : '' }}>Bold</option>
                                                <option value="lighter" {{ $configuration->{$heading.'_font_weight'} == 'lighter' ? 'selected' : '' }}>Lighter</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_line_height" class="block text-md font-medium text-gray-700 mb-1">Line Height</label>
                                            <input type="text" name="{{ $heading }}_line_height" id="{{ $heading }}_line_height" value="{{ $configuration->{$heading.'_line_height'} }}" placeholder="1.2" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_background_color" class="block text-md font-medium text-gray-700 mb-1">Background Color</label>
                                            <input type="text" name="{{ $heading }}_background_color" id="{{ $heading }}_background_color" value="{{ $configuration->{$heading.'_background_color'} }}" placeholder="transparent" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_border" class="block text-md font-medium text-gray-700 mb-1">Border</label>
                                            <input type="text" name="{{ $heading }}_border" id="{{ $heading }}_border" value="{{ $configuration->{$heading.'_border'} }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_border_radius" class="block text-md font-medium text-gray-700 mb-1">Border Radius</label>
                                            <input type="text" name="{{ $heading }}_border_radius" id="{{ $heading }}_border_radius" value="{{ $configuration->{$heading.'_border_radius'} }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_box_shadow" class="block text-md font-medium text-gray-700 mb-1">Box Shadow</label>
                                            <input type="text" name="{{ $heading }}_box_shadow" id="{{ $heading }}_box_shadow" value="{{ $configuration->{$heading.'_box_shadow'} }}" placeholder="none" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_padding" class="block text-md font-medium text-gray-700 mb-1">Padding</label>
                                            <input type="text" name="{{ $heading }}_padding" id="{{ $heading }}_padding" value="{{ $configuration->{$heading.'_padding'} }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $heading }}_margin" class="block text-md font-medium text-gray-700 mb-1">Margin</label>
                                            <input type="text" name="{{ $heading }}_margin" id="{{ $heading }}_margin" value="{{ $configuration->{$heading.'_margin'} }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Table Design -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Table Design</h4>
                                
                                @foreach(['tr', 'th', 'td'] as $tableElement)
                                <div class="mb-6">
                                    <h5 class="text-md font-medium text-gray-800 mb-3">{{ strtoupper($tableElement) }}</h5>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                        <div>
                                            <label for="{{ $tableElement }}_font_size" class="block text-md font-medium text-gray-700 mb-1">Font Size</label>
                                            <input type="text" name="{{ $tableElement }}_font_size" id="{{ $tableElement }}_font_size" value="{{ $configuration->{$tableElement.'_font_size'} }}" placeholder="14px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_font_color" class="block text-md font-medium text-gray-700 mb-1">Font Color</label>
                                            <input type="color" name="{{ $tableElement }}_font_color" id="{{ $tableElement }}_font_color" value="{{ $configuration->{$tableElement.'_font_color'} }}" class="block w-full h-8 rounded border-gray-300">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_font_hover_color" class="block text-md font-medium text-gray-700 mb-1">Hover Color</label>
                                            <input type="color" name="{{ $tableElement }}_font_hover_color" id="{{ $tableElement }}_font_hover_color" value="{{ $configuration->{$tableElement.'_font_hover_color'} }}" class="block w-full h-8 rounded border-gray-300">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_font_weight" class="block text-md font-medium text-gray-700 mb-1">Font Weight</label>
                                            <select name="{{ $tableElement }}_font_weight" id="{{ $tableElement }}_font_weight" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="normal" {{ $configuration->{$tableElement.'_font_weight'} == 'normal' ? 'selected' : '' }}>Normal</option>
                                                <option value="bold" {{ $configuration->{$tableElement.'_font_weight'} == 'bold' ? 'selected' : '' }}>Bold</option>
                                                <option value="lighter" {{ $configuration->{$tableElement.'_font_weight'} == 'lighter' ? 'selected' : '' }}>Lighter</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_line_height" class="block text-md font-medium text-gray-700 mb-1">Line Height</label>
                                            <input type="text" name="{{ $tableElement }}_line_height" id="{{ $tableElement }}_line_height" value="{{ $configuration->{$tableElement.'_line_height'} }}" placeholder="1.5" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_background_color" class="block text-md font-medium text-gray-700 mb-1">Background Color</label>
                                            <input type="text" name="{{ $tableElement }}_background_color" id="{{ $tableElement }}_background_color" value="{{ $configuration->{$tableElement.'_background_color'} }}" placeholder="transparent" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_border" class="block text-md font-medium text-gray-700 mb-1">Border</label>
                                            <input type="text" name="{{ $tableElement }}_border" id="{{ $tableElement }}_border" value="{{ $configuration->{$tableElement.'_border'} }}" placeholder="{{ $tableElement == 'th' || $tableElement == 'td' ? '1px solid #e5e7eb' : '0px' }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_border_radius" class="block text-md font-medium text-gray-700 mb-1">Border Radius</label>
                                            <input type="text" name="{{ $tableElement }}_border_radius" id="{{ $tableElement }}_border_radius" value="{{ $configuration->{$tableElement.'_border_radius'} }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_box_shadow" class="block text-md font-medium text-gray-700 mb-1">Box Shadow</label>
                                            <input type="text" name="{{ $tableElement }}_box_shadow" id="{{ $tableElement }}_box_shadow" value="{{ $configuration->{$tableElement.'_box_shadow'} }}" placeholder="none" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_padding" class="block text-md font-medium text-gray-700 mb-1">Padding</label>
                                            <input type="text" name="{{ $tableElement }}_padding" id="{{ $tableElement }}_padding" value="{{ $configuration->{$tableElement.'_padding'} }}" placeholder="{{ $tableElement == 'th' || $tableElement == 'td' ? '12px 16px' : '0px 0px 0px 0px' }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label for="{{ $tableElement }}_margin" class="block text-md font-medium text-gray-700 mb-1">Margin</label>
                                            <input type="text" name="{{ $tableElement }}_margin" id="{{ $tableElement }}_margin" value="{{ $configuration->{$tableElement.'_margin'} }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Footer Design -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Footer Design</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    <div>
                                        <label for="footer_text" class="block text-md font-medium text-gray-700 mb-1">Footer Text</label>
                                        <textarea name="footer_text" id="footer_text" rows="3" placeholder="© 2024 Your Company. All rights reserved." class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $configuration->footer_text }}</textarea>
                                    </div>
                                    <div>
                                        <label for="footer_font_size" class="block text-md font-medium text-gray-700 mb-1">Font Size</label>
                                        <input type="text" name="footer_font_size" id="footer_font_size" value="{{ $configuration->footer_font_size }}" placeholder="14px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="footer_font_color" class="block text-md font-medium text-gray-700 mb-1">Font Color</label>
                                        <input type="color" name="footer_font_color" id="footer_font_color" value="{{ $configuration->footer_font_color }}" class="block w-full h-8 rounded border-gray-300">
                                    </div>
                                    <div>
                                        <label for="footer_font_hover_color" class="block text-md font-medium text-gray-700 mb-1">Font Hover Color</label>
                                        <input type="color" name="footer_font_hover_color" id="footer_font_hover_color" value="{{ $configuration->footer_font_hover_color }}" class="block w-full h-8 rounded border-gray-300">
                                    </div>
                                    <div>
                                        <label for="footer_font_weight" class="block text-md font-medium text-gray-700 mb-1">Font Weight</label>
                                        <select name="footer_font_weight" id="footer_font_weight" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="normal" {{ $configuration->footer_font_weight == 'normal' ? 'selected' : '' }}>Normal</option>
                                            <option value="bold" {{ $configuration->footer_font_weight == 'bold' ? 'selected' : '' }}>Bold</option>
                                            <option value="lighter" {{ $configuration->footer_font_weight == 'lighter' ? 'selected' : '' }}>Lighter</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="footer_line_height" class="block text-md font-medium text-gray-700 mb-1">Line Height</label>
                                        <input type="text" name="footer_line_height" id="footer_line_height" value="{{ $configuration->footer_line_height }}" placeholder="1.5" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="footer_background_color" class="block text-md font-medium text-gray-700 mb-1">Background Color</label>
                                        <input type="color" name="footer_background_color" id="footer_background_color" value="{{ $configuration->footer_background_color }}" class="block w-full h-8 rounded border-gray-300">
                                    </div>
                                    <div>
                                        <label for="footer_border" class="block text-md font-medium text-gray-700 mb-1">Border</label>
                                        <input type="text" name="footer_border" id="footer_border" value="{{ $configuration->footer_border }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="footer_border_radius" class="block text-md font-medium text-gray-700 mb-1">Border Radius</label>
                                        <input type="text" name="footer_border_radius" id="footer_border_radius" value="{{ $configuration->footer_border_radius }}" placeholder="0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="footer_box_shadow" class="block text-md font-medium text-gray-700 mb-1">Box Shadow</label>
                                        <input type="text" name="footer_box_shadow" id="footer_box_shadow" value="{{ $configuration->footer_box_shadow }}" placeholder="none" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="footer_padding" class="block text-md font-medium text-gray-700 mb-1">Padding</label>
                                        <input type="text" name="footer_padding" id="footer_padding" value="{{ $configuration->footer_padding }}" placeholder="20px 0px 20px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="footer_margin" class="block text-md font-medium text-gray-700 mb-1">Margin</label>
                                        <input type="text" name="footer_margin" id="footer_margin" value="{{ $configuration->footer_margin }}" placeholder="0px 0px 0px 0px" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Save Configuration
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
