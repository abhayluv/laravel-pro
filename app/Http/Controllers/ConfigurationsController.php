<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\Storage;

class ConfigurationsController extends Controller
{
    public function index()
    {
        $configuration = Configuration::getCurrent();
        return view('configurations.index', compact('configuration'));
    }

    public function update(Request $request)
    {
        $configuration = Configuration::getCurrent();
        
        $data = $request->validate([
            'logo' => 'nullable|file|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'favicon' => 'nullable|file|mimes:ico,png|max:1024',
            'background_color' => 'required|string|max:7',
            'text_color' => 'required|string|max:7',
            'font_style' => 'required|string|max:50',
            'sidebar_background_color' => 'required|string|max:7',
            'sidebar_text_color' => 'required|string|max:7',
            'sidebar_font_size' => 'required|string|max:8',
            'sidebar_font_weight' => 'required|string|max:10',
            'sidebar_line_height' => 'required|string|max:5',
            'sidebar_border' => 'required|string',
            'sidebar_border_radius' => 'required|string|max:8',
            'sidebar_box_shadow' => 'required|string',
            'sidebar_padding' => 'required|string',
            'sidebar_margin' => 'required|string',
            'paragraph_font_size' => 'required|string|max:8',
            'paragraph_font_color' => 'required|string|max:7',
            'paragraph_font_hover_color' => 'required|string|max:7',
            'paragraph_font_weight' => 'required|string|max:10',
            'paragraph_line_height' => 'required|string|max:5',
            'paragraph_background_color' => 'required|string|max:12',
            'paragraph_border' => 'required|string',
            'paragraph_border_radius' => 'required|string|max:8',
            'paragraph_box_shadow' => 'required|string',
            'paragraph_padding' => 'required|string',
            'paragraph_margin' => 'required|string',
            'anchor_font_size' => 'required|string|max:8',
            'anchor_font_color' => 'required|string|max:7',
            'anchor_font_hover_color' => 'required|string|max:7',
            'anchor_font_weight' => 'required|string|max:10',
            'anchor_line_height' => 'required|string|max:5',
            'anchor_background_color' => 'required|string|max:7',
            'anchor_border' => 'required|string',
            'anchor_border_radius' => 'required|string|max:8',
            'anchor_box_shadow' => 'required|string',
            'anchor_padding' => 'required|string',
            'anchor_margin' => 'required|string',
            'h1_font_size' => 'required|string|max:8',
            'h1_font_color' => 'required|string|max:7',
            'h1_font_hover_color' => 'required|string|max:7',
            'h1_font_weight' => 'required|string|max:10',
            'h1_line_height' => 'required|string|max:5',
            'h1_background_color' => 'required|string|max:12',
            'h1_border' => 'required|string',
            'h1_border_radius' => 'required|string|max:8',
            'h1_box_shadow' => 'required|string',
            'h1_padding' => 'required|string',
            'h1_margin' => 'required|string',
            'h2_font_size' => 'required|string|max:8',
            'h2_font_color' => 'required|string|max:7',
            'h2_font_hover_color' => 'required|string|max:7',
            'h2_font_weight' => 'required|string|max:10',
            'h2_line_height' => 'required|string|max:5',
            'h2_background_color' => 'required|string|max:12',
            'h2_border' => 'required|string',
            'h2_border_radius' => 'required|string|max:8',
            'h2_box_shadow' => 'required|string',
            'h2_padding' => 'required|string',
            'h2_margin' => 'required|string',
            'h3_font_size' => 'required|string|max:8',
            'h3_font_color' => 'required|string|max:7',
            'h3_font_hover_color' => 'required|string|max:7',
            'h3_font_weight' => 'required|string|max:10',
            'h3_line_height' => 'required|string|max:5',
            'h3_background_color' => 'required|string|max:12',
            'h3_border' => 'required|string',
            'h3_border_radius' => 'required|string|max:8',
            'h3_box_shadow' => 'required|string',
            'h3_padding' => 'required|string',
            'h3_margin' => 'required|string',
            'h4_font_size' => 'required|string|max:8',
            'h4_font_color' => 'required|string|max:7',
            'h4_font_hover_color' => 'required|string|max:7',
            'h4_font_weight' => 'required|string|max:10',
            'h4_line_height' => 'required|string|max:5',
            'h4_background_color' => 'required|string|max:12',
            'h4_border' => 'required|string',
            'h4_border_radius' => 'required|string|max:8',
            'h4_box_shadow' => 'required|string',
            'h4_padding' => 'required|string',
            'h4_margin' => 'required|string',
            'h5_font_size' => 'required|string|max:8',
            'h5_font_color' => 'required|string|max:7',
            'h5_font_hover_color' => 'required|string|max:7',
            'h5_font_weight' => 'required|string|max:10',
            'h5_line_height' => 'required|string|max:5',
            'h5_background_color' => 'required|string|max:12',
            'h5_border' => 'required|string',
            'h5_border_radius' => 'required|string|max:8',
            'h5_box_shadow' => 'required|string',
            'h5_padding' => 'required|string',
            'h5_margin' => 'required|string',
            'h6_font_size' => 'required|string|max:8',
            'h6_font_color' => 'required|string|max:7',
            'h6_font_hover_color' => 'required|string|max:7',
            'h6_font_weight' => 'required|string|max:10',
            'h6_line_height' => 'required|string|max:5',
            'h6_background_color' => 'required|string|max:12',
            'h6_border' => 'required|string',
            'h6_border_radius' => 'required|string|max:8',
            'h6_box_shadow' => 'required|string',
            'h6_padding' => 'required|string',
            'h6_margin' => 'required|string',
            'tr_font_size' => 'required|string|max:8',
            'tr_font_color' => 'required|string|max:7',
            'tr_font_hover_color' => 'required|string|max:7',
            'tr_font_weight' => 'required|string|max:10',
            'tr_line_height' => 'required|string|max:5',
            'tr_background_color' => 'required|string|max:12',
            'tr_border' => 'required|string',
            'tr_border_radius' => 'required|string|max:8',
            'tr_box_shadow' => 'required|string',
            'tr_padding' => 'required|string',
            'tr_margin' => 'required|string',
            'th_font_size' => 'required|string|max:8',
            'th_font_color' => 'required|string|max:7',
            'th_font_hover_color' => 'required|string|max:7',
            'th_font_weight' => 'required|string|max:10',
            'th_line_height' => 'required|string|max:5',
            'th_background_color' => 'required|string|max:7',
            'th_border' => 'required|string',
            'th_border_radius' => 'required|string|max:8',
            'th_box_shadow' => 'required|string',
            'th_padding' => 'required|string',
            'th_margin' => 'required|string',
            'td_font_size' => 'required|string|max:8',
            'td_font_color' => 'required|string|max:7',
            'td_font_hover_color' => 'required|string|max:7',
            'td_font_weight' => 'required|string|max:10',
            'td_line_height' => 'required|string|max:5',
            'td_background_color' => 'required|string|max:12',
            'td_border' => 'required|string',
            'td_border_radius' => 'required|string|max:8',
            'td_box_shadow' => 'required|string',
            'td_padding' => 'required|string',
            'td_margin' => 'required|string',
            'footer_text' => 'required|string',
            'footer_font_size' => 'required|string|max:8',
            'footer_font_color' => 'required|string|max:7',
            'footer_font_hover_color' => 'required|string|max:7',
            'footer_font_weight' => 'required|string|max:10',
            'footer_line_height' => 'required|string|max:5',
            'footer_background_color' => 'required|string|max:12',
            'footer_border' => 'required|string',
            'footer_border_radius' => 'required|string|max:8',
            'footer_box_shadow' => 'required|string',
            'footer_padding' => 'required|string',
            'footer_margin' => 'required|string',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($configuration->logo_path) {
                Storage::disk('public')->delete($configuration->logo_path);
            }
            $configuration->logo_path = $request->file('logo')->store('configurations', 'public');
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            if ($configuration->favicon_path) {
                Storage::disk('public')->delete($configuration->favicon_path);
            }
            $configuration->favicon_path = $request->file('favicon')->store('configurations', 'public');
        }

        // Update all other fields
        $configuration->fill($data);
        $configuration->save();

        // Clear configuration cache
        Configuration::clearCache();

        return redirect()->route('configurations.index')->with('success', 'Configuration updated successfully!');
    }
}
