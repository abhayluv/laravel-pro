<?php

namespace App\Http\Controllers;

use App\Models\MasterForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MasterFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $view = $request->query('view', 'grid');
        $search = $request->query('search');
        $status = $request->query('status');

        $query = MasterForm::query();
        
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }
        
        if ($status !== null && $status !== '') {
            $query->where('status', (bool) $status);
        }

        $masterForms = $query->latest()->paginate(12)->withQueryString();

        return view('master-forms.index', compact('masterForms', 'view', 'search', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-forms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:master_forms,email|max:255',
            'phone_number' => 'required|min:10|max:12',
            'gender' => 'required|in:1,2,3',
            'single_selection' => 'required|integer',
            'multi_selection' => 'required|array',
            'multi_selection.*' => 'integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'video' => 'nullable|file|mimes:mp4,avi,mov,flv,wmv,webm|max:10240',
            'languages' => 'nullable|array',
            'languages.*' => 'in:English,Hindi,Gujarati',
            'password' => 'required|string|min:8|confirmed',
            'date_field' => 'nullable|date',
            'time_field' => 'nullable|date_format:H:i',
            'datetime_field' => 'nullable|date',
            'date_range_start' => 'nullable|date',
            'date_range_end' => 'nullable|date|after_or_equal:date_range_start',
            'range_slider_value' => 'nullable|integer|min:0|max:100',
            'address' => 'nullable|string|max:1000',
            'signature' => 'nullable|string',
            'text_editor' => 'nullable|string',
            'star_rating' => 'nullable|integer|min:0|max:5',
            'captcha' => 'nullable|string',
        ], [
            'full_name.required' => 'Full name is required.',
            'full_name.max' => 'Full name cannot exceed 255 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'phone_number.required' => 'Phone number is required.',
            'phone_number.min' => 'Phone number must be at least 10 digits.',
            'phone_number.max' => 'Phone number cannot exceed 12 digits.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Please select a valid gender option.',
            'single_selection.required' => 'Please select a single option.',
            'multi_selection.required' => 'Please select at least one option.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, PNG, and GIF files are allowed.',
            'image.max' => 'Image size cannot exceed 2MB.',
            'video.file' => 'The file must be a valid video file.',
            'video.mimes' => 'Only MP4, AVI, MOV, FLV, WMV, and WEBM files are allowed.',
            'video.max' => 'Video size cannot exceed 10MB.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'date_range_end.after_or_equal' => 'End date must be after or equal to start date.',
            'range_slider_value.min' => 'Range slider value must be at least 0.',
            'range_slider_value.max' => 'Range slider value cannot exceed 100.',
            'star_rating.min' => 'Star rating must be at least 0.',
            'star_rating.max' => 'Star rating cannot exceed 5.',
        ]);

        // Handle file uploads
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('master-forms/images', 'public');
        }

        if ($request->hasFile('video')) {
            $validated['video_path'] = $request->file('video')->store('master-forms/videos', 'public');
        }

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        MasterForm::create($validated);

        return redirect()->route('master-forms.index')
            ->with('success', 'Master form created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterForm $masterForm)
    {
        return view('master-forms.show', compact('masterForm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterForm $masterForm)
    {
        return view('master-forms.edit', compact('masterForm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterForm $masterForm)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('master_forms')->ignore($masterForm->id), 'max:255'],
            'phone_number' => 'required|min:10|max:12',
            'gender' => 'required|in:1,2,3',
            'single_selection' => 'required|integer',
            'multi_selection' => 'required|array',
            'multi_selection.*' => 'integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'video' => 'nullable|file|mimes:mp4,avi,mov,flv,wmv,webm|max:10240',
            'languages' => 'nullable|array',
            'languages.*' => 'in:English,Hindi,Gujarati',
            'password' => 'nullable|string|min:8|confirmed',
            'date_field' => 'nullable|date',
            'time_field' => 'nullable|date_format:H:i',
            'datetime_field' => 'nullable|date',
            'date_range_start' => 'nullable|date',
            'date_range_end' => 'nullable|date|after_or_equal:date_range_start',
            'range_slider_value' => 'nullable|integer|min:0|max:100',
            'address' => 'nullable|string|max:1000',
            'signature' => 'nullable|string',
            'text_editor' => 'nullable|string',
            'star_rating' => 'nullable|integer|min:0|max:5',
            'captcha' => 'nullable|string',
        ], [
            'full_name.required' => 'Full name is required.',
            'full_name.max' => 'Full name cannot exceed 255 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'phone_number.required' => 'Phone number is required.',
            'phone_number.min' => 'Phone number must be at least 10 digits.',
            'phone_number.max' => 'Phone number cannot exceed 12 digits.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Please select a valid gender option.',
            'single_selection.required' => 'Please select a single option.',
            'multi_selection.required' => 'Please select at least one option.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, PNG, and GIF files are allowed.',
            'image.max' => 'Image size cannot exceed 2MB.',
            'video.file' => 'The file must be a valid video file.',
            'video.mimes' => 'Only MP4, AVI, MOV, FLV, WMV, and WEBM files are allowed.',
            'video.max' => 'Video size cannot exceed 10MB.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'date_range_end.after_or_equal' => 'End date must be after or equal to start date.',
            'range_slider_value.min' => 'Range slider value must be at least 0.',
            'range_slider_value.max' => 'Range slider value cannot exceed 100.',
            'star_rating.min' => 'Star rating must be at least 0.',
            'star_rating.max' => 'Star rating cannot exceed 5.',
        ]);

        // Handle file uploads
        if ($request->hasFile('image')) {
            // Delete old image
            if ($masterForm->image_path) {
                Storage::disk('public')->delete($masterForm->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('master-forms/images', 'public');
        }

        if ($request->hasFile('video')) {
            // Delete old video
            if ($masterForm->video_path) {
                Storage::disk('public')->delete($masterForm->video_path);
            }
            $validated['video_path'] = $request->file('video')->store('master-forms/videos', 'public');
        }

        // Hash password if provided
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $masterForm->update($validated);

        return redirect()->route('master-forms.index')
            ->with('success', 'Master form updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterForm $masterForm)
    {
        // Delete associated files
        if ($masterForm->image_path) {
            Storage::disk('public')->delete($masterForm->image_path);
        }
        if ($masterForm->video_path) {
            Storage::disk('public')->delete($masterForm->video_path);
        }

        $masterForm->delete();

        return redirect()->route('master-forms.index')
            ->with('success', 'Master form deleted successfully.');
    }

    /**
     * Toggle status of the master form
     */
    public function toggleStatus(MasterForm $masterForm)
    {
        $masterForm->update(['status' => !$masterForm->status]);

        return response()->json([
            'success' => true,
            'status' => $masterForm->status,
            'message' => 'Status updated successfully.'
        ]);
    }
}
