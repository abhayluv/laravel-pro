<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Configuration Test Page
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Configuration Test Page</h1>
                    <p>This page tests the dynamic configuration styles. The background, text color, and font should be applied from the configuration.</p>
                    
                    <div class="mt-6 p-4 border border-gray-200 rounded">
                        <h2>Heading 2 Test</h2>
                        <h3>Heading 3 Test</h3>
                        <h4>Heading 4 Test</h4>
                        <h5>Heading 5 Test</h5>
                        <h6>Heading 6 Test</h6>
                    </div>
                    
                    <div class="mt-6 p-4 border border-gray-200 rounded">
                        <h3>Paragraph Test</h3>
                        <p>This is a paragraph with configured styles. It should have the paragraph font size, color, and other properties applied.</p>
                        <p>Another paragraph to test the styling.</p>
                    </div>
                    
                    <div class="mt-6 p-4 border border-gray-200 rounded">
                        <h3>Link Test</h3>
                        <p>Here are some <a href="#" class="text-blue-600 hover:text-blue-800">links</a> to test the anchor styling. They should have the configured link colors and hover effects.</p>
                    </div>
                    
                    <div class="mt-6 p-4 border border-gray-200 rounded">
                        <h3>Table Test</h3>
                        <table class="w-full border border-gray-300">
                            <tr>
                                <th class="border border-gray-300 p-2">Header 1</th>
                                <th class="border border-gray-300 p-2">Header 2</th>
                                <th class="border border-gray-300 p-2">Header 3</th>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">Cell 1</td>
                                <td class="border border-gray-300 p-2">Cell 2</td>
                                <td class="border border-gray-300 p-2">Cell 3</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">Cell 4</td>
                                <td class="border border-gray-300 p-2">Cell 5</td>
                                <td class="border border-gray-300 p-2">Cell 6</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="mt-6 p-4 border border-gray-200 rounded">
                        <h3>Tailwind Override Test</h3>
                        <p class="text-gray-900">This text has Tailwind classes that should be overridden by the configuration.</p>
                        <div class="bg-gray-100 p-4 m-4">
                            This div has Tailwind background classes that should be overridden.
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-gray-100 rounded">
                        <h3>Configuration Summary</h3>
                        <p><strong>Background Color:</strong> {{ $configuration->background_color }}</p>
                        <p><strong>Text Color:</strong> {{ $configuration->text_color }}</p>
                        <p><strong>Font Style:</strong> {{ $configuration->font_style }}</p>
                        <p><strong>Sidebar Background:</strong> {{ $configuration->sidebar_background_color }}</p>
                        <p><strong>Sidebar Text:</strong> {{ $configuration->sidebar_text_color }}</p>
                        
                        <div class="mt-4">
                            <h4>Basic Settings</h4>
                                                         @if($configuration->logo_url)
                                 <p><strong>Logo:</strong> <img src="{{ asset($configuration->logo_url) }}" alt="Logo" class="h-12 w-auto inline-block ml-2"></p>
                             @else
                                 <p><strong>Logo:</strong> Not set (using default)</p>
                             @endif
                            
                                                         @if($configuration->favicon_url)
                                 <p><strong>Favicon:</strong> <img src="{{ asset($configuration->favicon_url) }}" alt="Favicon" class="h-6 w-6 inline-block ml-2"></p>
                             @else
                                 <p><strong>Favicon:</strong> Not set (using default)</p>
                             @endif
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-gray-100 rounded">
                        <h3>Generated CSS Preview</h3>
                        <details>
                            <summary>Click to view generated CSS</summary>
                            <pre class="mt-2 p-2 bg-gray-800 text-green-400 text-xs overflow-auto max-h-96">{{ $css }}</pre>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
