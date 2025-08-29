<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = [
        'logo_path',
        'favicon_path',
        'background_color',
        'text_color',
        'font_style',
        'sidebar_background_color',
        'sidebar_text_color',
        'sidebar_font_size',
        'sidebar_font_weight',
        'sidebar_line_height',
        'sidebar_border',
        'sidebar_border_radius',
        'sidebar_box_shadow',
        'sidebar_padding',
        'sidebar_margin',
        'paragraph_font_size',
        'paragraph_font_color',
        'paragraph_font_hover_color',
        'paragraph_font_weight',
        'paragraph_line_height',
        'paragraph_background_color',
        'paragraph_border',
        'paragraph_border_radius',
        'paragraph_box_shadow',
        'paragraph_padding',
        'paragraph_margin',
        'anchor_font_size',
        'anchor_font_color',
        'anchor_font_hover_color',
        'anchor_font_weight',
        'anchor_line_height',
        'anchor_background_color',
        'anchor_border',
        'anchor_border_radius',
        'anchor_box_shadow',
        'anchor_padding',
        'anchor_margin',
        'h1_font_size',
        'h1_font_color',
        'h1_font_hover_color',
        'h1_font_weight',
        'h1_line_height',
        'h1_background_color',
        'h1_border',
        'h1_border_radius',
        'h1_box_shadow',
        'h1_padding',
        'h1_margin',
        'h2_font_size',
        'h2_font_color',
        'h2_font_hover_color',
        'h2_font_weight',
        'h2_line_height',
        'h2_background_color',
        'h2_border',
        'h2_border_radius',
        'h2_box_shadow',
        'h2_padding',
        'h2_margin',
        'h3_font_size',
        'h3_font_color',
        'h3_font_hover_color',
        'h3_font_weight',
        'h3_line_height',
        'h3_background_color',
        'h3_border',
        'h3_border_radius',
        'h3_box_shadow',
        'h3_padding',
        'h3_margin',
        'h4_font_size',
        'h4_font_color',
        'h4_font_hover_color',
        'h4_font_weight',
        'h4_line_height',
        'h4_background_color',
        'h4_border',
        'h4_border_radius',
        'h4_box_shadow',
        'h4_padding',
        'h4_margin',
        'h5_font_size',
        'h5_font_color',
        'h5_font_hover_color',
        'h5_font_weight',
        'h5_line_height',
        'h5_background_color',
        'h5_border',
        'h5_border_radius',
        'h5_box_shadow',
        'h5_padding',
        'h5_margin',
        'h6_font_size',
        'h6_font_color',
        'h6_font_hover_color',
        'h6_font_weight',
        'h6_line_height',
        'h6_background_color',
        'h6_border',
        'h6_border_radius',
        'h6_box_shadow',
        'h6_padding',
        'h6_margin',
        'tr_font_size',
        'tr_font_color',
        'tr_font_hover_color',
        'tr_font_weight',
        'tr_line_height',
        'tr_background_color',
        'tr_border',
        'tr_border_radius',
        'tr_box_shadow',
        'tr_padding',
        'tr_margin',
        'th_font_size',
        'th_font_color',
        'th_font_hover_color',
        'th_font_weight',
        'th_line_height',
        'th_background_color',
        'th_border',
        'th_border_radius',
        'th_box_shadow',
        'th_padding',
        'th_margin',
        'td_font_size',
        'td_font_color',
        'td_font_hover_color',
        'td_font_weight',
        'td_line_height',
        'td_background_color',
        'td_border',
        'td_border_radius',
        'td_box_shadow',
        'td_padding',
        'td_margin',
        'footer_text',
        'footer_font_size',
        'footer_font_color',
        'footer_font_hover_color',
        'footer_font_weight',
        'footer_line_height',
        'footer_background_color',
        'footer_border',
        'footer_border_radius',
        'footer_box_shadow',
        'footer_padding',
        'footer_margin',
    ];

    /**
     * Get the current configuration or create default one
     */
    public static function getCurrent()
    {
        return static::first() ?? static::createDefault();
    }

    /**
     * Clear configuration cache
     */
    public static function clearCache()
    {
        // Clear any cached configurations
        if (method_exists(app(), 'cache')) {
            app('cache')->forget('configuration_current');
        }
    }

    /**
     * Get logo URL
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo_path ? \Storage::url($this->logo_path) : null;
    }

    /**
     * Get favicon URL
     */
    public function getFaviconUrlAttribute()
    {
        return $this->favicon_path ? \Storage::url($this->favicon_path) : null;
    }

    /**
     * Create default configuration
     */
    public static function createDefault()
    {
        return static::create([
            'background_color' => '#ffffff',
            'text_color' => '#000000',
            'font_style' => 'Arial, sans-serif',
            'sidebar_background_color' => '#1f2937',
            'sidebar_text_color' => '#ffffff',
            'sidebar_font_size' => '14px',
            'sidebar_font_weight' => 'normal',
            'sidebar_line_height' => '1.5',
            'sidebar_border' => '0px',
            'sidebar_border_radius' => '0px',
            'sidebar_box_shadow' => 'none',
            'sidebar_padding' => '0px 0px 0px 0px',
            'sidebar_margin' => '0px 0px 0px 0px',
            'paragraph_font_size' => '16px',
            'paragraph_font_color' => '#374151',
            'paragraph_font_hover_color' => '#1f2937',
            'paragraph_font_weight' => 'normal',
            'paragraph_line_height' => '1.6',
            'paragraph_background_color' => 'transparent',
            'paragraph_border' => '0px',
            'paragraph_border_radius' => '0px',
            'paragraph_box_shadow' => 'none',
            'paragraph_padding' => '0px 0px 0px 0px',
            'paragraph_margin' => '0px 0px 0px 0px',
            'anchor_font_size' => '16px',
            'anchor_font_color' => '#3b82f6',
            'anchor_font_hover_color' => '#1d4ed8',
            'anchor_font_weight' => 'normal',
            'anchor_line_height' => '1.5',
            'anchor_background_color' => '#3b82f6',
            'anchor_border' => '0px',
            'anchor_border_radius' => '0px',
            'anchor_box_shadow' => 'none',
            'anchor_padding' => '0px 0px 0px 0px',
            'anchor_margin' => '0px 0px 0px 0px',
            'h1_font_size' => '32px',
            'h1_font_color' => '#111827',
            'h1_font_hover_color' => '#000000',
            'h1_font_weight' => 'bold',
            'h1_line_height' => '1.2',
            'h1_background_color' => 'transparent',
            'h1_border' => '0px',
            'h1_border_radius' => '0px',
            'h1_box_shadow' => 'none',
            'h1_padding' => '0px 0px 0px 0px',
            'h1_margin' => '0px 0px 0px 0px',
            'h2_font_size' => '28px',
            'h2_font_color' => '#111827',
            'h2_font_hover_color' => '#000000',
            'h2_font_weight' => 'bold',
            'h2_line_height' => '1.3',
            'h2_background_color' => 'transparent',
            'h2_border' => '0px',
            'h2_border_radius' => '0px',
            'h2_box_shadow' => 'none',
            'h2_padding' => '0px 0px 0px 0px',
            'h2_margin' => '0px 0px 0px 0px',
            'h3_font_size' => '24px',
            'h3_font_color' => '#111827',
            'h3_font_hover_color' => '#000000',
            'h3_font_weight' => 'bold',
            'h3_line_height' => '1.4',
            'h3_background_color' => 'transparent',
            'h3_border' => '0px',
            'h3_border_radius' => '0px',
            'h3_box_shadow' => 'none',
            'h3_padding' => '0px 0px 0px 0px',
            'h3_margin' => '0px 0px 0px 0px',
            'h4_font_size' => '20px',
            'h4_font_color' => '#111827',
            'h4_font_hover_color' => '#000000',
            'h4_font_weight' => 'bold',
            'h4_line_height' => '1.4',
            'h4_background_color' => 'transparent',
            'h4_border' => '0px',
            'h4_border_radius' => '0px',
            'h4_box_shadow' => 'none',
            'h4_padding' => '0px 0px 0px 0px',
            'h4_margin' => '0px 0px 0px 0px',
            'h5_font_size' => '18px',
            'h5_font_color' => '#111827',
            'h5_font_hover_color' => '#000000',
            'h5_font_weight' => 'bold',
            'h5_line_height' => '1.4',
            'h5_background_color' => 'transparent',
            'h5_border' => '0px',
            'h5_border_radius' => '0px',
            'h5_box_shadow' => 'none',
            'h5_padding' => '0px 0px 0px 0px',
            'h5_margin' => '0px 0px 0px 0px',
            'h6_font_size' => '16px',
            'h6_font_color' => '#111827',
            'h6_font_hover_color' => '#000000',
            'h6_font_weight' => 'bold',
            'h6_line_height' => '1.4',
            'h6_background_color' => 'transparent',
            'h6_border' => '0px',
            'h6_border_radius' => '0px',
            'h6_box_shadow' => 'none',
            'h6_padding' => '0px 0px 0px 0px',
            'h6_margin' => '0px 0px 0px 0px',
            'tr_font_size' => '14px',
            'tr_font_color' => '#374151',
            'tr_font_hover_color' => '#111827',
            'tr_font_weight' => 'normal',
            'tr_line_height' => '1.5',
            'tr_background_color' => 'transparent',
            'tr_border' => '0px',
            'tr_border_radius' => '0px',
            'tr_box_shadow' => 'none',
            'tr_padding' => '0px 0px 0px 0px',
            'tr_margin' => '0px 0px 0px 0px',
            'th_font_size' => '14px',
            'th_font_color' => '#111827',
            'th_font_hover_color' => '#000000',
            'th_font_weight' => 'bold',
            'th_line_height' => '1.5',
            'th_background_color' => '#f9fafb',
            'th_border' => '1px solid #e5e7eb',
            'th_border_radius' => '0px',
            'th_box_shadow' => 'none',
            'th_padding' => '12px 16px',
            'th_margin' => '0px 0px 0px 0px',
            'td_font_size' => '14px',
            'td_font_color' => '#374151',
            'td_font_hover_color' => '#111827',
            'td_font_weight' => 'normal',
            'td_line_height' => '1.5',
            'td_background_color' => 'transparent',
            'td_border' => '1px solid #e5e7eb',
            'td_border_radius' => '0px',
            'td_box_shadow' => 'none',
            'td_padding' => '12px 16px',
            'td_margin' => '0px 0px 0px 0px',
            'footer_text' => '© 2024 Your Company. All rights reserved.',
            'footer_font_size' => '14px',
            'footer_font_color' => '#6b7280',
            'footer_font_hover_color' => '#374151',
            'footer_font_weight' => 'normal',
            'footer_line_height' => '1.5',
            'footer_background_color' => '#f9fafb',
            'footer_border' => '0px',
            'footer_border_radius' => '0px',
            'footer_box_shadow' => 'none',
            'footer_padding' => '20px 0px 20px 0px',
            'footer_margin' => '0px 0px 0px 0px',
        ]);
    }

    /**
     * Generate CSS for the configuration
     */
    public function generateCSS()
    {
        return "
        /* Global Styles - High Specificity (Excluding Sidebar) */
        html body:not(aside):not(.sidebar):not([class*='sidebar']) {
            background-color: {$this->background_color} !important;
            color: {$this->text_color} !important;
            font-family: {$this->font_style} !important;
        }

        /* Main Content Area - Global Design */
        html body main,
        html body .main-content,
        html body [class*='main'],
        html body [class*='content']:not([class*='sidebar']) {
            background-color: {$this->background_color} !important;
            color: {$this->text_color} !important;
            font-family: {$this->font_style} !important;
        }

        /* Sidebar Styles - High Specificity (Only Sidebar) */
        html body aside,
        html body .sidebar,
        html body [class*='sidebar'],
        html body nav {
            background-color: {$this->sidebar_background_color} !important;
            color: {$this->sidebar_text_color} !important;
            font-size: {$this->sidebar_font_size} !important;
            font-weight: {$this->sidebar_font_weight} !important;
            line-height: {$this->sidebar_line_height} !important;
            border: {$this->sidebar_border} !important;
            border-radius: {$this->sidebar_border_radius} !important;
            box-shadow: {$this->sidebar_box_shadow} !important;
            padding: {$this->sidebar_padding} !important;
            margin: {$this->sidebar_margin} !important;
        }

        /* Sidebar Links and Elements */
        html body aside a,
        html body .sidebar a,
        html body [class*='sidebar'] a,
        html body nav a {
            color: {$this->sidebar_text_color} !important;
            font-size: {$this->sidebar_font_size} !important;
            font-weight: {$this->sidebar_font_weight} !important;
        }

        html body aside a:hover,
        html body .sidebar a:hover,
        html body [class*='sidebar'] a:hover,
        html body nav a:hover {
            color: {$this->sidebar_text_color} !important;
        }

        /* Paragraph Styles - High Specificity (Excluding Sidebar) */
        html body main p,
        html body .main-content p,
        html body [class*='main'] p,
        html body [class*='content']:not([class*='sidebar']) p,
        html body main .paragraph,
        html body .main-content .paragraph,
        html body [class*='main'] .paragraph,
        html body [class*='content']:not([class*='sidebar']) .paragraph {
            font-size: {$this->paragraph_font_size} !important;
            color: {$this->paragraph_font_color} !important;
            font-weight: {$this->paragraph_font_weight} !important;
            line-height: {$this->paragraph_line_height} !important;
            background-color: {$this->paragraph_background_color} !important;
            border: {$this->paragraph_border} !important;
            border-radius: {$this->paragraph_border_radius} !important;
            box-shadow: {$this->paragraph_box_shadow} !important;
            padding: {$this->paragraph_padding} !important;
            margin: {$this->paragraph_margin} !important;
        }

        html body main p:hover,
        html body .main-content p:hover,
        html body [class*='main'] p:hover,
        html body [class*='content']:not([class*='sidebar']) p:hover,
        html body main .paragraph:hover,
        html body .main-content .paragraph:hover,
        html body [class*='main'] .paragraph:hover,
        html body [class*='content']:not([class*='sidebar']) .paragraph:hover {
            color: {$this->paragraph_font_hover_color} !important;
        }

        /* Anchor Styles - High Specificity (Excluding Sidebar) */
        html body main a:not(nav a):not(aside a):not(.sidebar a),
        html body .main-content a:not(nav a):not(aside a):not(.sidebar a),
        html body [class*='main'] a:not(nav a):not(aside a):not(.sidebar a),
        html body [class*='content']:not([class*='sidebar']) a:not(nav a):not(aside a):not(.sidebar a),
        html body main .link:not(nav .link):not(aside .link):not(.sidebar .link),
        html body .main-content .link:not(nav .link):not(aside .link):not(.sidebar .link),
        html body [class*='main'] .link:not(nav .link):not(aside .link):not(.sidebar .link),
        html body [class*='content']:not([class*='sidebar']) .link:not(nav .link):not(aside .link):not(.sidebar .link) {
            font-size: {$this->anchor_font_size} !important;
            color: {$this->anchor_font_color} !important;
            font-weight: {$this->anchor_font_weight} !important;
            line-height: {$this->anchor_line_height} !important;
            background-color: {$this->anchor_background_color} !important;
            border: {$this->anchor_border} !important;
            border-radius: {$this->anchor_border_radius} !important;
            box-shadow: {$this->anchor_box_shadow} !important;
            padding: {$this->anchor_padding} !important;
            margin: {$this->anchor_margin} !important;
        }

        html body main a:hover:not(nav a):not(aside a):not(.sidebar a),
        html body .main-content a:hover:not(nav a):not(aside a):not(.sidebar a),
        html body [class*='main'] a:hover:not(nav a):not(aside a):not(.sidebar a),
        html body [class*='content']:not([class*='sidebar']) a:hover:not(nav a):not(aside a):not(.sidebar a),
        html body main .link:hover:not(nav .link):not(aside .link):not(.sidebar .link),
        html body .main-content .link:hover:not(nav .link):not(aside .link):not(.sidebar .link),
        html body [class*='main'] .link:hover:not(nav .link):not(aside .link):not(.sidebar .link),
        html body [class*='content']:not([class*='sidebar']) .link:hover:not(nav .link):not(aside .link):not(.sidebar .link) {
            color: {$this->anchor_font_hover_color} !important;
        }

        /* Heading Styles - High Specificity (Excluding Sidebar) */
        html body main h1,
        html body .main-content h1,
        html body [class*='main'] h1,
        html body [class*='content']:not([class*='sidebar']) h1,
        html body main .h1,
        html body .main-content .h1,
        html body [class*='main'] .h1,
        html body [class*='content']:not([class*='sidebar']) .h1 {
            font-size: {$this->h1_font_size} !important;
            color: {$this->h1_font_color} !important;
            font-weight: {$this->h1_font_weight} !important;
            line-height: {$this->h1_line_height} !important;
            background-color: {$this->h1_background_color} !important;
            border: {$this->h1_border} !important;
            border-radius: {$this->h1_border_radius} !important;
            box-shadow: {$this->h1_box_shadow} !important;
            padding: {$this->h1_padding} !important;
            margin: {$this->h1_margin} !important;
        }

        html body main h1:hover,
        html body .main-content h1:hover,
        html body [class*='main'] h1:hover,
        html body [class*='content']:not([class*='sidebar']) h1:hover,
        html body main .h1:hover,
        html body .main-content .h1:hover,
        html body [class*='main'] .h1:hover,
        html body [class*='content']:not([class*='sidebar']) .h1:hover {
            color: {$this->h1_font_hover_color} !important;
        }

        html body main h2,
        html body .main-content h2,
        html body [class*='main'] h2,
        html body [class*='content']:not([class*='sidebar']) h2,
        html body main .h2,
        html body .main-content .h2,
        html body [class*='main'] .h2,
        html body [class*='content']:not([class*='sidebar']) .h2 {
            font-size: {$this->h2_font_size} !important;
            color: {$this->h2_font_color} !important;
            font-weight: {$this->h2_font_weight} !important;
            line-height: {$this->h2_line_height} !important;
            background-color: {$this->h2_background_color} !important;
            border: {$this->h2_border} !important;
            border-radius: {$this->h2_border_radius} !important;
            box-shadow: {$this->h2_box_shadow} !important;
            padding: {$this->h2_padding} !important;
            margin: {$this->h2_margin} !important;
        }

        html body main h2:hover,
        html body .main-content h2:hover,
        html body [class*='main'] h2:hover,
        html body [class*='content']:not([class*='sidebar']) h2:hover,
        html body main .h2:hover,
        html body .main-content .h2:hover,
        html body [class*='main'] .h2:hover,
        html body [class*='content']:not([class*='sidebar']) .h2:hover {
            color: {$this->h2_font_hover_color} !important;
        }

        html body main h3,
        html body .main-content h3,
        html body [class*='main'] h3,
        html body [class*='content']:not([class*='sidebar']) h3,
        html body main .h3,
        html body .main-content .h3,
        html body [class*='main'] .h3,
        html body [class*='content']:not([class*='sidebar']) .h3 {
            font-size: {$this->h3_font_size} !important;
            color: {$this->h3_font_color} !important;
            font-weight: {$this->h3_font_weight} !important;
            line-height: {$this->h3_line_height} !important;
            background-color: {$this->h3_background_color} !important;
            border: {$this->h3_border} !important;
            border-radius: {$this->h3_border_radius} !important;
            box-shadow: {$this->h3_box_shadow} !important;
            padding: {$this->h3_padding} !important;
            margin: {$this->h3_margin} !important;
        }

        html body main h3:hover,
        html body .main-content h3:hover,
        html body [class*='main'] h3:hover,
        html body [class*='content']:not([class*='sidebar']) h3:hover,
        html body main .h3:hover,
        html body .main-content .h3:hover,
        html body [class*='main'] .h3:hover,
        html body [class*='content']:not([class*='sidebar']) .h3:hover {
            color: {$this->h3_font_hover_color} !important;
        }

        html body main h4,
        html body .main-content h4,
        html body [class*='main'] h4,
        html body [class*='content']:not([class*='sidebar']) h4,
        html body main .h4,
        html body .main-content .h4,
        html body [class*='main'] .h4,
        html body [class*='content']:not([class*='sidebar']) .h4 {
            font-size: {$this->h4_font_size} !important;
            color: {$this->h4_font_color} !important;
            font-weight: {$this->h4_font_weight} !important;
            line-height: {$this->h4_line_height} !important;
            background-color: {$this->h4_background_color} !important;
            border: {$this->h4_border} !important;
            border-radius: {$this->h4_border_radius} !important;
            box-shadow: {$this->h4_box_shadow} !important;
            padding: {$this->h4_padding} !important;
            margin: {$this->h4_margin} !important;
        }

        html body main h4:hover,
        html body .main-content h4:hover,
        html body [class*='main'] h4:hover,
        html body [class*='content']:not([class*='sidebar']) h4:hover,
        html body main .h4:hover,
        html body .main-content .h4:hover,
        html body [class*='main'] .h4:hover,
        html body [class*='content']:not([class*='sidebar']) .h4:hover {
            color: {$this->h4_font_hover_color} !important;
        }

        html body main h5,
        html body .main-content h5,
        html body [class*='main'] h5,
        html body [class*='content']:not([class*='sidebar']) h5,
        html body main .h5,
        html body .main-content .h5,
        html body [class*='main'] .h5,
        html body [class*='content']:not([class*='sidebar']) .h5 {
            font-size: {$this->h5_font_size} !important;
            color: {$this->h5_font_color} !important;
            font-weight: {$this->h5_font_weight} !important;
            line-height: {$this->h5_line_height} !important;
            background-color: {$this->h5_background_color} !important;
            border: {$this->h5_border} !important;
            border-radius: {$this->h5_border_radius} !important;
            box-shadow: {$this->h5_box_shadow} !important;
            padding: {$this->h5_padding} !important;
            margin: {$this->h5_margin} !important;
        }

        html body main h5:hover,
        html body .main-content h5:hover,
        html body [class*='main'] h5:hover,
        html body [class*='content']:not([class*='sidebar']) h5:hover,
        html body main .h5:hover,
        html body .main-content .h5:hover,
        html body [class*='main'] .h5:hover,
        html body [class*='content']:not([class*='sidebar']) .h5:hover {
            color: {$this->h5_font_hover_color} !important;
        }

        html body main h6,
        html body .main-content h6,
        html body [class*='main'] h6,
        html body [class*='content']:not([class*='sidebar']) h6,
        html body main .h6,
        html body .main-content .h6,
        html body [class*='main'] .h6,
        html body [class*='content']:not([class*='sidebar']) .h6 {
            font-size: {$this->h6_font_size} !important;
            color: {$this->h6_font_color} !important;
            font-weight: {$this->h6_font_weight} !important;
            line-height: {$this->h6_line_height} !important;
            background-color: {$this->h6_background_color} !important;
            border: {$this->h6_border} !important;
            border-radius: {$this->h6_border_radius} !important;
            box-shadow: {$this->h6_box_shadow} !important;
            padding: {$this->h6_padding} !important;
            margin: {$this->h6_margin} !important;
        }

        html body main h6:hover,
        html body .main-content h6:hover,
        html body [class*='main'] h6:hover,
        html body [class*='content']:not([class*='sidebar']) h6:hover,
        html body main .h6:hover,
        html body .main-content .h6:hover,
        html body [class*='main'] .h6:hover,
        html body [class*='content']:not([class*='sidebar']) .h6:hover {
            color: {$this->h6_font_hover_color} !important;
        }

        /* Table Styles - High Specificity (Excluding Sidebar) */
        html body main tr,
        html body .main-content tr,
        html body [class*='main'] tr,
        html body [class*='content']:not([class*='sidebar']) tr,
        html body main .table-row,
        html body .main-content .table-row,
        html body [class*='main'] .table-row,
        html body [class*='content']:not([class*='sidebar']) .table-row {
            font-size: {$this->tr_font_size} !important;
            color: {$this->tr_font_color} !important;
            font-weight: {$this->tr_font_weight} !important;
            line-height: {$this->tr_line_height} !important;
            background-color: {$this->tr_background_color} !important;
            border: {$this->tr_border} !important;
            border-radius: {$this->tr_border_radius} !important;
            box-shadow: {$this->tr_box_shadow} !important;
            padding: {$this->tr_padding} !important;
            margin: {$this->tr_margin} !important;
        }

        html body main tr:hover,
        html body .main-content tr:hover,
        html body [class*='main'] tr:hover,
        html body [class*='content']:not([class*='sidebar']) tr:hover,
        html body main .table-row:hover,
        html body .main-content .table-row:hover,
        html body [class*='main'] .table-row:hover,
        html body [class*='content']:not([class*='sidebar']) .table-row:hover {
            color: {$this->tr_font_hover_color} !important;
        }

        html body main th,
        html body .main-content th,
        html body [class*='main'] th,
        html body [class*='content']:not([class*='sidebar']) th,
        html body main .table-header,
        html body .main-content .table-header,
        html body [class*='main'] .table-header,
        html body [class*='content']:not([class*='sidebar']) .table-header {
            font-size: {$this->th_font_size} !important;
            color: {$this->th_font_color} !important;
            font-weight: {$this->th_font_weight} !important;
            line-height: {$this->th_line_height} !important;
            background-color: {$this->th_background_color} !important;
            border: {$this->th_border} !important;
            border-radius: {$this->th_border_radius} !important;
            box-shadow: {$this->th_box_shadow} !important;
            padding: {$this->th_padding} !important;
            margin: {$this->th_margin} !important;
        }

        html body main th:hover,
        html body .main-content th:hover,
        html body [class*='main'] th:hover,
        html body [class*='content']:not([class*='sidebar']) th:hover,
        html body main .table-header:hover,
        html body .main-content .table-header:hover,
        html body [class*='main'] .table-header:hover,
        html body [class*='content']:not([class*='sidebar']) .table-header:hover {
            color: {$this->th_font_hover_color} !important;
        }

        html body main td,
        html body .main-content td,
        html body [class*='main'] td,
        html body [class*='content']:not([class*='sidebar']) td,
        html body main .table-cell,
        html body .main-content .table-cell,
        html body [class*='main'] .table-cell,
        html body [class*='content']:not([class*='sidebar']) .table-cell {
            font-size: {$this->td_font_size} !important;
            color: {$this->td_font_color} !important;
            font-weight: {$this->td_font_weight} !important;
            line-height: {$this->td_line_height} !important;
            background-color: {$this->td_background_color} !important;
            border: {$this->td_border} !important;
            border-radius: {$this->td_border_radius} !important;
            box-shadow: {$this->td_box_shadow} !important;
            padding: {$this->td_padding} !important;
            margin: {$this->td_margin} !important;
        }

        html body main td:hover,
        html body .main-content td:hover,
        html body [class*='main'] td:hover,
        html body [class*='content']:not([class*='sidebar']) td:hover,
        html body main .table-cell:hover,
        html body .main-content .table-cell:hover,
        html body [class*='main'] .table-cell:hover,
        html body [class*='content']:not([class*='sidebar']) .table-cell:hover {
            color: {$this->td_font_hover_color} !important;
        }

        /* Override Tailwind Classes - Maximum Specificity (Excluding Sidebar) */
        html body main .bg-gray-100,
        html body .main-content .bg-gray-100,
        html body [class*='main'] .bg-gray-100,
        html body [class*='content']:not([class*='sidebar']) .bg-gray-100 {
            background-color: {$this->background_color} !important;
        }

        html body main .text-gray-900,
        html body main .text-gray-800,
        html body main .text-gray-700,
        html body main .text-gray-600,
        html body main .text-gray-500,
        html body main .text-gray-400,
        html body main .text-gray-300,
        html body main .text-gray-200,
        html body main .text-gray-100,
        html body main .text-black,
        html body main .text-white,
        html body .main-content .text-gray-900,
        html body .main-content .text-gray-800,
        html body .main-content .text-gray-700,
        html body .main-content .text-gray-600,
        html body .main-content .text-gray-500,
        html body .main-content .text-gray-400,
        html body .main-content .text-gray-300,
        html body .main-content .text-gray-200,
        html body .main-content .text-gray-100,
        html body .main-content .text-black,
        html body .main-content .text-white {
            color: {$this->text_color} !important;
        }

        html body main .bg-white,
        html body .main-content .bg-white,
        html body [class*='main'] .bg-white,
        html body [class*='content']:not([class*='sidebar']) .bg-white {
            background-color: {$this->background_color} !important;
        }

        html body main .font-sans,
        html body .main-content .font-sans,
        html body [class*='main'] .font-sans,
        html body [class*='content']:not([class*='sidebar']) .font-sans {
            font-family: {$this->font_style} !important;
        }

        /* Override specific Tailwind sidebar classes (Only for Sidebar) */
        html body aside .bg-gray-800,
        html body aside .bg-gray-900,
        html body aside .bg-blue-600,
        html body aside .bg-blue-700,
        html body aside .bg-blue-800,
        html body aside .bg-blue-900,
        html body .sidebar .bg-gray-800,
        html body .sidebar .bg-gray-900,
        html body .sidebar .bg-blue-600,
        html body .sidebar .bg-blue-700,
        html body .sidebar .bg-blue-800,
        html body .sidebar .bg-blue-900,
        html body nav .bg-gray-800,
        html body nav .bg-gray-900,
        html body nav .bg-blue-600,
        html body nav .bg-blue-700,
        html body nav .bg-blue-800,
        html body nav .bg-blue-900 {
            background-color: {$this->sidebar_background_color} !important;
        }

        html body aside .text-white,
        html body aside .text-gray-100,
        html body aside .text-gray-200,
        html body .sidebar .text-white,
        html body .sidebar .text-gray-100,
        html body .sidebar .text-gray-200,
        html body nav .text-white,
        html body nav .text-gray-100,
        html body nav .text-gray-200 {
            color: {$this->sidebar_text_color} !important;
        }

        /* Footer Styles - High Specificity */
        html body footer,
        html body .footer,
        html body [class*='footer'] {
            font-size: {$this->footer_font_size} !important;
            color: {$this->footer_font_color} !important;
            font-weight: {$this->footer_font_weight} !important;
            line-height: {$this->footer_line_height} !important;
            background-color: {$this->footer_background_color} !important;
            border: {$this->footer_border} !important;
            border-radius: {$this->footer_border_radius} !important;
            box-shadow: {$this->footer_box_shadow} !important;
            padding: {$this->footer_padding} !important;
            margin: {$this->footer_margin} !important;
        }

        html body footer:hover,
        html body .footer:hover,
        html body [class*='footer']:hover {
            color: {$this->footer_font_hover_color} !important;
        }

        /* Footer Links */
        html body footer a,
        html body .footer a,
        html body [class*='footer'] a {
            color: {$this->footer_font_color} !important;
            font-size: {$this->footer_font_size} !important;
            font-weight: {$this->footer_font_weight} !important;
        }

        html body footer a:hover,
        html body .footer a:hover,
        html body [class*='footer'] a:hover {
            color: {$this->footer_font_hover_color} !important;
        }
        ";
    }
}
