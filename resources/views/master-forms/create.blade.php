<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Master Form') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="mx-auto">
            <div class="bg-gray-50 dark:bg-gray-900 shadow-sm sm:rounded-lg border border-gray-200 rounded">
                <div class="p-6 sm:p-8 text-gray-900">
                <form method="POST" action="{{ route('master-forms.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div>
                            <label for="full_name" class="block text-md font-medium text-gray-700">Full Name *</label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                                   required>
                            @error('full_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-md font-medium text-gray-700">Email *</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                                   required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone_number" class="block text-md font-medium text-gray-700">Phone Number *</label>
                            <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" minlength="10" maxlength="12" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                                   required>
                            @error('phone_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-md font-medium text-gray-700 mb-2">Gender *</label>
                            <div class="flex flex-wrap">
                                <label class="flex items-center">
                                    <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} 
                                           class="mr-2 text-indigo-600 focus:ring-indigo-500" required>
                                    <span class="text-sm text-gray-700">Male</span>
                                </label>
                                <label class="flex items-center ms-2">
                                    <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} 
                                           class="mr-2 text-indigo-600 focus:ring-indigo-500" required>
                                    <span class="text-sm text-gray-700">Female</span>
                                </label>
                                <label class="flex items-center ms-2">
                                    <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} 
                                           class="mr-2 text-indigo-600 focus:ring-indigo-500" required>
                                    <span class="text-sm text-gray-700">Other</span>
                                </label>
                            </div>
                            @error('gender')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Single Selection -->
                        <div>
                            <label for="single_selection" class="block text-md font-medium text-gray-700 mb-2">Single Selection *</label>
                            <select name="single_selection" id="single_selection" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Select an option</option>
                                <option value="1" {{ old('single_selection') == '1' ? 'selected' : '' }}>Option 1</option>
                                <option value="2" {{ old('single_selection') == '2' ? 'selected' : '' }}>Option 2</option>
                                <option value="3" {{ old('single_selection') == '3' ? 'selected' : '' }}>Option 3</option>
                                <option value="4" {{ old('single_selection') == '4' ? 'selected' : '' }}>Option 4</option>
                                <option value="5" {{ old('single_selection') == '5' ? 'selected' : '' }}>Option 5</option>
                            </select>
                            @error('single_selection')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Multi Selection -->
                        <div>
                            <label for="multi_selection" class="block text-md font-medium text-gray-700 mb-2">Multi Selection *</label>
                            <select name="multi_selection[]" id="multi_selection" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" multiple>
                                <option value="">Select an option</option>
                                <option value="1" {{ in_array('1', old('multi_selection', [])) ? 'selected' : '' }}>Multi Option 1</option>
                                <option value="2" {{ in_array('2', old('multi_selection', [])) ? 'selected' : '' }}>Multi Option 2</option>
                                <option value="3" {{ in_array('3', old('multi_selection', [])) ? 'selected' : '' }}>Multi Option 3</option>
                                <option value="4" {{ in_array('4', old('multi_selection', [])) ? 'selected' : '' }}>Multi Option 4</option>
                                <option value="5" {{ in_array('5', old('multi_selection', [])) ? 'selected' : '' }}>Multi Option 5</option>
                            </select>
                            @error('multi_selection')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-md font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image" accept="image/jpg,image/jpeg,image/png,image/gif" 
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, JPEG, PNG, GIF. Max size: 2MB. Example size: 800x600px</p>
                            <div id="image-preview" class="mt-2 hidden">
                                <img id="preview-img" class="h-32 w-32 object-cover rounded border" alt="Preview">
                            </div>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Video Upload -->
                        <div>
                            <label for="video" class="block text-md font-medium text-gray-700">Video</label>
                            <input type="file" name="video" id="video" accept="video/mp4,video/avi,video/mov,video/flv,video/wmv,video/webm" 
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-xs text-gray-500">Accepted formats: MP4, AVI, MOV, FLV, WMV, WEBM. Max size: 10MB. Example size: 1920x1080px</p>
                            <div id="video-preview" class="mt-2 hidden">
                                <video id="preview-video" class="h-32 w-full object-cover rounded border" controls>
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            @error('video')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Languages -->
                        <div>
                            <label class="block text-md font-medium text-gray-700 mb-2">Languages</label>
                            <div class="flex flex-wrap">
                                <label class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="English" {{ in_array('English', old('languages', [])) ? 'checked' : '' }} 
                                           class="mr-2 text-indigo-600 focus:ring-indigo-500">
                                    <span class="text-sm text-gray-700">English</span>
                                </label>
                                <label class="flex items-center ms-2">
                                    <input type="checkbox" name="languages[]" value="Hindi" {{ in_array('Hindi', old('languages', [])) ? 'checked' : '' }} 
                                           class="mr-2 text-indigo-600 focus:ring-indigo-500">
                                    <span class="text-sm text-gray-700">Hindi</span>
                                </label>
                                <label class="flex items-center ms-2">
                                    <input type="checkbox" name="languages[]" value="Gujarati" {{ in_array('Gujarati', old('languages', [])) ? 'checked' : '' }} 
                                           class="mr-2 text-indigo-600 focus:ring-indigo-500">
                                    <span class="text-sm text-gray-700">Gujarati</span>
                                </label>
                            </div>
                            @error('languages')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-md font-medium text-gray-700">Password *</label>
                            <input type="password" name="password" id="password" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                                   required>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-md font-medium text-gray-700">Confirm Password *</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                                   required>
                        </div>

                        <!-- Date Field -->
                        <div>
                            <label for="date_field" class="block text-md font-medium text-gray-700">Date</label>
                            <input type="date" name="date_field" id="date_field" value="{{ old('date_field') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('date_field')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Time Field -->
                        <div>
                            <label for="time_field" class="block text-md font-medium text-gray-700">Time</label>
                            <input type="time" name="time_field" id="time_field" value="{{ old('time_field') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('time_field')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- DateTime Field -->
                        <div>
                            <label for="datetime_field" class="block text-md font-medium text-gray-700">Date & Time</label>
                            <input type="datetime-local" name="datetime_field" id="datetime_field" value="{{ old('datetime_field') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('datetime_field')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date Range Start -->
                        <div>
                            <label for="date_range_start" class="block text-md font-medium text-gray-700">Date Range Start</label>
                            <input type="date" name="date_range_start" id="date_range_start" value="{{ old('date_range_start') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('date_range_start')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date Range End -->
                        <div>
                            <label for="date_range_end" class="block text-md font-medium text-gray-700">Date Range End</label>
                            <input type="date" name="date_range_end" id="date_range_end" value="{{ old('date_range_end') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('date_range_end')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Range Slider -->
                        <div>
                            <label for="range_slider_value" class="block text-md font-medium text-gray-700">Range Slider: <span id="slider-value">50</span></label>
                            <input type="range" name="range_slider_value" id="range_slider_value" min="0" max="100" value="{{ old('range_slider_value', 50) }}" 
                                   class="mt-1 block w-full h-2 bg-gray-200 rounded-lg cursor-pointer slider" 
                                   oninput="document.getElementById('slider-value').textContent = this.value">
                            @error('range_slider_value')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Star Rating -->
                        <div>
                            <label class="block text-md font-medium text-gray-700 mb-2">Star Rating</label>
                            <div class="flex space-x-1" id="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-8 h-8 cursor-pointer star" data-rating="{{ $i }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                @endfor
                            </div>
                            <input type="hidden" name="star_rating" id="star_rating_input" value="{{ old('star_rating', 0) }}">
                            @error('star_rating')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-md font-medium text-gray-700">Address</label>
                        <textarea name="address" id="address" rows="3" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Signature -->
                    <div>
                        <label for="signature" class="block text-md font-medium text-gray-700">Signature</label>
                        <div class="mt-1 border border-gray-300 rounded-md p-4">
                            <canvas id="signature-canvas" width="400" height="200" class="border border-gray-300 rounded cursor-crosshair"></canvas>
                            <input type="hidden" name="signature" id="signature_input">
                            <div class="mt-2 space-x-2">
                                <button type="button" id="clear-signature" class="px-3 py-1 text-sm bg-gray-500 text-white rounded hover:bg-gray-600">Clear</button>
                                <button type="button" id="save-signature" class="px-3 py-1 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700">Save Signature</button>
                            </div>
                        </div>
                        @error('signature')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Text Editor -->
                    <div>
                        <label for="text_editor" class="block text-md font-medium text-gray-700">Text Editor</label>
                        <textarea name="text_editor" id="text_editor" rows="6" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('text_editor') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Use the rich text editor below for formatting, links, and media content.</p>
                        @error('text_editor')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Captcha -->
                    <div>
                        <label for="captcha" class="block text-md font-medium text-gray-700">Captcha</label>
                        <div class="mt-1 flex items-center space-x-2">
                            <div class="bg-gray-100 p-2 rounded text-sm font-mono" id="captcha-display">ABC123</div>
                            <button type="button" id="refresh-captcha" class="px-2 py-1 text-sm bg-gray-500 text-white rounded hover:bg-gray-600">↻</button>
                        </div>
                        <input type="text" name="captcha" id="captcha" placeholder="Enter the code above" 
                               class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('captcha')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('master-forms.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-md font-medium text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-indigo-700">
                            Create Master Form
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize Select2 for the multi-selection field
            $('#single_selection').select2({
                placeholder: 'Select options',
                allowClear: true,
            });
            $('#single_selection').next(".select2-selection").addClass("mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500");

            // Initialize Select2 for the multi-selection field
            $('#multi_selection').select2({
                placeholder: 'Select options',
                allowClear: true,
            });
            $('#multi_selection').next(".select2-selection").addClass("mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500");

            // Initialize CKEditor for text editor with comprehensive features
            ClassicEditor
                .create(document.querySelector('#text_editor'), {
                    toolbar: {
                        items: [
                            'undo', 'redo',
                            '|', 'heading',
                            '|', 'bold', 'italic', 'strikethrough', 'underline',
                            '|', 'link', 'blockQuote', 'code',
                            '|', 'insertTable', 'mediaEmbed',
                            '|', 'bulletedList', 'numberedList',
                            '|', 'outdent', 'indent',
                            '|', 'fontColor', 'fontBackgroundColor',
                            '|', 'alignment',
                            '|', 'removeFormat'
                        ]
                    },
                    language: 'en',
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                        ]
                    },
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'imageStyle:full',
                            'imageStyle:side'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    link: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://'
                    },
                    mediaEmbed: {
                        previewsInData: true
                    },
                    licenseKey: '',
                })
                .then(editor => {
                    console.log('CKEditor initialized successfully with all features');
                    
                    // Update the textarea value when editor content changes
                    editor.model.document.on('change:data', () => {
                        const data = editor.getData();
                        document.querySelector('#text_editor').value = data;
                    });

                    // Add custom event listeners for better integration
                    editor.editing.view.document.on('click', (evt, data) => {
                        console.log('Editor clicked');
                    });

                    // Handle form submission
                    const form = document.querySelector('form');
                    if (form) {
                        form.addEventListener('submit', () => {
                            const data = editor.getData();
                            document.querySelector('#text_editor').value = data;
                        });
                    }
                })
                .catch(error => {
                    console.error('CKEditor initialization failed:', error);
                    // Fallback to basic textarea if CKEditor fails
                    console.log('Falling back to basic textarea');
                });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Image preview
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.classList.add('hidden');
                }
            });

            // Video preview
            const videoInput = document.getElementById('video');
            const videoPreview = document.getElementById('video-preview');
            const previewVideo = document.getElementById('preview-video');

            videoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const url = URL.createObjectURL(file);
                    previewVideo.src = url;
                    videoPreview.classList.remove('hidden');
                } else {
                    videoPreview.classList.add('hidden');
                }
            });

            // Star rating
            const stars = document.querySelectorAll('.star');
            const starRatingInput = document.getElementById('star_rating_input');
            let currentRating = parseInt(starRatingInput.value);

            function updateStars(rating) {
                stars.forEach((star, index) => {
                    if (index < rating) {
                        star.classList.add('text-yellow-400');
                        star.classList.remove('text-gray-300');
                    } else {
                        star.classList.remove('text-yellow-400');
                        star.classList.add('text-gray-300');
                    }
                });
            }

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.dataset.rating);
                    currentRating = rating;
                    starRatingInput.value = rating;
                    updateStars(rating);
                });

                star.addEventListener('mouseenter', function() {
                    const rating = parseInt(this.dataset.rating);
                    updateStars(rating);
                });

                star.addEventListener('mouseleave', function() {
                    updateStars(currentRating);
                });
            });

            // Initialize star rating
            updateStars(currentRating);

            // Signature canvas
            const canvas = document.getElementById('signature-canvas');
            const ctx = canvas.getContext('2d');
            const clearBtn = document.getElementById('clear-signature');
            const saveBtn = document.getElementById('save-signature');
            const signatureInput = document.getElementById('signature_input');
            let isDrawing = false;
            let lastX = 0;
            let lastY = 0;

            ctx.strokeStyle = '#000';
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';

            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('mouseout', stopDrawing);

            function startDrawing(e) {
                isDrawing = true;
                [lastX, lastY] = [e.offsetX, e.offsetY];
            }

            function draw(e) {
                if (!isDrawing) return;
                ctx.beginPath();
                ctx.moveTo(lastX, lastY);
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
                [lastX, lastY] = [e.offsetX, e.offsetY];
            }

            function stopDrawing() {
                isDrawing = false;
            }

            clearBtn.addEventListener('click', function() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                signatureInput.value = '';
            });

            saveBtn.addEventListener('click', function() {
                signatureInput.value = canvas.toDataURL();
                alert('Signature saved!');
            });

            // Captcha
            function generateCaptcha() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result = '';
                for (let i = 0; i < 6; i++) {
                    result += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                document.getElementById('captcha-display').textContent = result;
            }

            document.getElementById('refresh-captcha').addEventListener('click', generateCaptcha);
            generateCaptcha(); // Generate initial captcha
        });
    </script>
    @endpush
</x-app-layout>
