<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        @if($configuration->favicon_url)
            <link rel="icon" type="image/x-icon" href="{{ asset($configuration->favicon_url) }}">
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Select 2 Css -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- CKEditor CSS -->
        <link href="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.css" rel="stylesheet" />
        <!-- Jquery File -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <div class="flex h-screen">
                <aside class="w-64 bg-white border-r border-gray-200 flex-shrink-0">
                    @include('layouts.navigation')
                </aside>

                <div class="flex-1 flex flex-col min-h-0">
                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-white shadow border-b border-gray-200">
                            <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <!-- Success Messages -->
                    @if(session('success'))
                        <div class="mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-4">
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    @endif

                    <!-- Page Content -->
                    <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-auto">
                        {{ $slot }}
                    </main>

                    <!-- Footer -->
                    @if($configuration->footer_text)
                        <footer class="bg-white border-t border-gray-200">
                            <div class="mx-auto px-4 sm:px-6 lg:px-8 py-4">
                                <div class="text-center">
                                    {!! $configuration->footer_text !!}
                                </div>
                            </div>
                        </footer>
                    @endif
                </div>
            </div>
        </div>
        <!-- Select 2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- CKEditor JS -->
        <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
        @stack('scripts')
    </body>
</html>
