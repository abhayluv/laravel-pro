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
        Schema::table('configurations', function (Blueprint $table) {
            // Footer Design Fields
            $table->text('footer_text')->nullable()->after('td_margin');
            $table->string('footer_font_size', 8)->default('14px')->after('footer_text');
            $table->string('footer_font_color', 7)->default('#6b7280')->after('footer_font_size');
            $table->string('footer_font_hover_color', 7)->default('#374151')->after('footer_font_color');
            $table->string('footer_font_weight', 10)->default('normal')->after('footer_font_hover_color');
            $table->string('footer_line_height', 5)->default('1.5')->after('footer_font_weight');
            $table->string('footer_background_color', 7)->default('#f9fafb')->after('footer_line_height');
            $table->text('footer_border')->default('0px')->after('footer_background_color');
            $table->string('footer_border_radius', 8)->default('0px')->after('footer_border');
            $table->text('footer_box_shadow')->default('none')->after('footer_border_radius');
            $table->text('footer_padding')->default('20px 0px 20px 0px')->after('footer_box_shadow');
            $table->text('footer_margin')->default('0px 0px 0px 0px')->after('footer_padding');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->dropColumn([
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
                'footer_margin'
            ]);
        });
    }
};
