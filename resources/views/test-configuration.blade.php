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
                    
                    <div class="mt-6 p-4 border border-gray-200 rounded">
                        <h3>Sidebar Link Test</h3>
                        <p>Below are test sidebar links that should use the configuration styles:</p>
                        
                        <div class="mt-4 space-y-2">
                            <!-- Regular sidebar link -->
                            <a href="#" class="sidebar-link flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Regular Sidebar Link</span>
                            </a>
                            
                            <!-- Active sidebar link -->
                            <a href="#" class="sidebar-link-active flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082m-.75-.082a24.301 24.301 0 00-4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L5 14.5m0 0v5.714a2.25 2.25 0 001.591.659L19.8 15.3" />
                                </svg>
                                <span>Active Sidebar Link (Current Page)</span>
                            </a>
                            
                            <!-- Sub-link -->
                            <a href="#" class="sidebar-link flex items-center px-3 py-2 pl-8 text-sm font-medium rounded-md">
                                <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75H4.5v-.75z" />
                                </svg>
                                <span>Sub Link</span>
                            </a>
                        </div>
                        
                        <div class="mt-4 p-3 bg-gray-50 rounded">
                            <p class="text-sm text-gray-600">
                                <strong>Note:</strong> These test links should display with the sidebar link configuration styles. 
                                The regular link should use the "Link Background Color", "Link Text Color", "Link Padding", and "Link Margin". 
                                The active link should use the "Active Link Background Color", "Active Link Text Color", border settings, "Link Padding", and "Link Margin".
                            </p>
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
                            <h4>Sidebar Link Settings</h4>
                            <p><strong>Link Background:</strong> <span style="color: {{ $configuration->sidebar_link_background_color }};">{{ $configuration->sidebar_link_background_color }}</span></p>
                            <p><strong>Link Background Hover:</strong> <span style="color: {{ $configuration->sidebar_link_background_hover_color }};">{{ $configuration->sidebar_link_background_hover_color }}</span></p>
                            <p><strong>Link Text Color:</strong> <span style="color: {{ $configuration->sidebar_link_text_color }};">{{ $configuration->sidebar_link_text_color }}</span></p>
                            <p><strong>Link Text Hover:</strong> <span style="color: {{ $configuration->sidebar_link_text_hover_color }};">{{ $configuration->sidebar_link_text_hover_color }}</span></p>
                            <p><strong>Active Link Background:</strong> <span style="color: {{ $configuration->sidebar_active_link_background_color }};">{{ $configuration->sidebar_active_link_background_color }}</span></p>
                            <p><strong>Active Link Text:</strong> <span style="color: {{ $configuration->sidebar_active_link_text_color }};">{{ $configuration->sidebar_active_link_text_color }}</span></p>
                            <p><strong>Active Link Border Top:</strong> {{ $configuration->sidebar_active_link_border_top }}</p>
                            <p><strong>Active Link Border Right:</strong> {{ $configuration->sidebar_active_link_border_right }}</p>
                            <p><strong>Active Link Border Bottom:</strong> {{ $configuration->sidebar_active_link_border_bottom }}</p>
                            <p><strong>Active Link Border Left:</strong> {{ $configuration->sidebar_active_link_border_left }}</p>
                            <p><strong>Link Padding:</strong> <code>{{ $configuration->sidebar_link_padding }}</code></p>
                            <p><strong>Link Margin:</strong> <code>{{ $configuration->sidebar_link_margin }}</code></p>
                        </div>
                        
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
