<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            
            // Basic Settings
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();
            
            // Design Section - Background
            $table->string('background_color', 7)->default('#ffffff');
            $table->string('text_color', 7)->default('#000000');
            $table->string('font_style', 50)->default('Arial, sans-serif');
            
            // Sidebar Design
            $table->string('sidebar_background_color', 7)->default('#1f2937');
            $table->string('sidebar_text_color', 7)->default('#ffffff');
            $table->string('sidebar_font_size', 8)->default('14px');
            $table->string('sidebar_font_weight', 10)->default('normal');
            $table->string('sidebar_line_height', 5)->default('1.5');
            $table->text('sidebar_border')->default('0px');
            $table->string('sidebar_border_radius', 8)->default('0px');
            $table->text('sidebar_box_shadow')->default('none');
            $table->text('sidebar_padding')->default('0px 0px 0px 0px');
            $table->text('sidebar_margin')->default('0px 0px 0px 0px');
            
            // Paragraph Design
            $table->string('paragraph_font_size', 8)->default('16px');
            $table->string('paragraph_font_color', 7)->default('#374151');
            $table->string('paragraph_font_hover_color', 7)->default('#1f2937');
            $table->string('paragraph_font_weight', 10)->default('normal');
            $table->string('paragraph_line_height', 5)->default('1.6');
            $table->string('paragraph_background_color', 12)->default('transparent');
            $table->text('paragraph_border')->default('0px');
            $table->string('paragraph_border_radius', 8)->default('0px');
            $table->text('paragraph_box_shadow')->default('none');
            $table->text('paragraph_padding')->default('0px 0px 0px 0px');
            $table->text('paragraph_margin')->default('0px 0px 0px 0px');
            
            // Anchor Tag Design
            $table->string('anchor_font_size', 8)->default('16px');
            $table->string('anchor_font_color', 7)->default('#3b82f6');
            $table->string('anchor_font_hover_color', 7)->default('#1d4ed8');
            $table->string('anchor_font_weight', 10)->default('normal');
            $table->string('anchor_line_height', 5)->default('1.5');
            $table->string('anchor_background_color', 7)->default('#3b82f6');
            $table->text('anchor_border')->default('0px');
            $table->string('anchor_border_radius', 8)->default('0px');
            $table->text('anchor_box_shadow')->default('none');
            $table->text('anchor_padding')->default('0px 0px 0px 0px');
            $table->text('anchor_margin')->default('0px 0px 0px 0px');
            
            // Typography Tags - H1
            $table->string('h1_font_size', 8)->default('32px');
            $table->string('h1_font_color', 7)->default('#111827');
            $table->string('h1_font_hover_color', 7)->default('#000000');
            $table->string('h1_font_weight', 10)->default('bold');
            $table->string('h1_line_height', 5)->default('1.2');
            $table->string('h1_background_color', 12)->default('transparent');
            $table->text('h1_border')->default('0px');
            $table->string('h1_border_radius', 8)->default('0px');
            $table->text('h1_box_shadow')->default('none');
            $table->text('h1_padding')->default('0px 0px 0px 0px');
            $table->text('h1_margin')->default('0px 0px 0px 0px');
            
            // Typography Tags - H2
            $table->string('h2_font_size', 8)->default('28px');
            $table->string('h2_font_color', 7)->default('#111827');
            $table->string('h2_font_hover_color', 7)->default('#000000');
            $table->string('h2_font_weight', 10)->default('bold');
            $table->string('h2_line_height', 5)->default('1.3');
            $table->string('h2_background_color', 12)->default('transparent');
            $table->text('h2_border')->default('0px');
            $table->string('h2_border_radius', 8)->default('0px');
            $table->text('h2_box_shadow')->default('none');
            $table->text('h2_padding')->default('0px 0px 0px 0px');
            $table->text('h2_margin')->default('0px 0px 0px 0px');
            
            // Typography Tags - H3
            $table->string('h3_font_size', 8)->default('24px');
            $table->string('h3_font_color', 7)->default('#111827');
            $table->string('h3_font_hover_color', 7)->default('#000000');
            $table->string('h3_font_weight', 10)->default('bold');
            $table->string('h3_line_height', 5)->default('1.4');
            $table->string('h3_background_color', 12)->default('transparent');
            $table->text('h3_border')->default('0px');
            $table->string('h3_border_radius', 8)->default('0px');
            $table->text('h3_box_shadow')->default('none');
            $table->text('h3_padding')->default('0px 0px 0px 0px');
            $table->text('h3_margin')->default('0px 0px 0px 0px');
            
            // Typography Tags - H4
            $table->string('h4_font_size', 8)->default('20px');
            $table->string('h4_font_color', 7)->default('#111827');
            $table->string('h4_font_hover_color', 7)->default('#000000');
            $table->string('h4_font_weight', 10)->default('bold');
            $table->string('h4_line_height', 5)->default('1.4');
            $table->string('h4_background_color', 12)->default('transparent');
            $table->text('h4_border')->default('0px');
            $table->string('h4_border_radius', 8)->default('0px');
            $table->text('h4_box_shadow')->default('none');
            $table->text('h4_padding')->default('0px 0px 0px 0px');
            $table->text('h4_margin')->default('0px 0px 0px 0px');
            
            // Typography Tags - H5
            $table->string('h5_font_size', 8)->default('18px');
            $table->string('h5_font_color', 7)->default('#111827');
            $table->string('h5_font_hover_color', 7)->default('#000000');
            $table->string('h5_font_weight', 10)->default('bold');
            $table->string('h5_line_height', 5)->default('1.4');
            $table->string('h5_background_color', 12)->default('transparent');
            $table->text('h5_border')->default('0px');
            $table->string('h5_border_radius', 8)->default('0px');
            $table->text('h5_box_shadow')->default('none');
            $table->text('h5_padding')->default('0px 0px 0px 0px');
            $table->text('h5_margin')->default('0px 0px 0px 0px');
            
            // Typography Tags - H6
            $table->string('h6_font_size', 8)->default('16px');
            $table->string('h6_font_color', 7)->default('#111827');
            $table->string('h6_font_hover_color', 7)->default('#000000');
            $table->string('h6_font_weight', 10)->default('bold');
            $table->string('h6_line_height', 5)->default('1.4');
            $table->string('h6_background_color', 12)->default('transparent');
            $table->text('h6_border')->default('0px');
            $table->string('h6_border_radius', 8)->default('0px');
            $table->text('h6_box_shadow')->default('none');
            $table->text('h6_padding')->default('0px 0px 0px 0px');
            $table->text('h6_margin')->default('0px 0px 0px 0px');
            
            // Table Design - TR
            $table->string('tr_font_size', 8)->default('14px');
            $table->string('tr_font_color', 7)->default('#374151');
            $table->string('tr_font_hover_color', 7)->default('#111827');
            $table->string('tr_font_weight', 10)->default('normal');
            $table->string('tr_line_height', 5)->default('1.5');
            $table->string('tr_background_color', 12)->default('transparent');
            $table->text('tr_border')->default('0px');
            $table->string('tr_border_radius', 8)->default('0px');
            $table->text('tr_box_shadow')->default('none');
            $table->text('tr_padding')->default('0px 0px 0px 0px');
            $table->text('tr_margin')->default('0px 0px 0px 0px');
            
            // Table Design - TH
            $table->string('th_font_size', 8)->default('14px');
            $table->string('th_font_color', 7)->default('#111827');
            $table->string('th_font_hover_color', 7)->default('#000000');
            $table->string('th_font_weight', 10)->default('bold');
            $table->string('th_line_height', 5)->default('1.5');
            $table->string('th_background_color', 7)->default('#f9fafb');
            $table->text('th_border')->default('1px solid #e5e7eb');
            $table->string('th_border_radius', 8)->default('0px');
            $table->text('th_box_shadow')->default('none');
            $table->text('th_padding')->default('12px 16px');
            $table->text('th_margin')->default('0px 0px 0px 0px');
            
            // Table Design - TD
            $table->string('td_font_size', 8)->default('14px');
            $table->string('td_font_color', 7)->default('#374151');
            $table->string('td_font_hover_color', 7)->default('#111827');
            $table->string('td_font_weight', 10)->default('normal');
            $table->string('td_line_height', 5)->default('1.5');
            $table->string('td_background_color', 12)->default('transparent');
            $table->text('td_border')->default('1px solid #e5e7eb');
            $table->string('td_border_radius', 8)->default('0px');
            $table->text('td_box_shadow')->default('none');
            $table->text('td_padding')->default('12px 16px');
            $table->text('td_margin')->default('0px 0px 0px 0px');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
