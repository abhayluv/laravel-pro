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
            // Sidebar Link Design
            $table->string('sidebar_link_background_color')->default('#374151')->after('sidebar_margin');
            $table->string('sidebar_link_background_hover_color')->default('#4b5563')->after('sidebar_link_background_color');
            $table->string('sidebar_link_text_color')->default('#ffffff')->after('sidebar_link_background_hover_color');
            $table->string('sidebar_link_text_hover_color')->default('#ffffff')->after('sidebar_link_text_color');
            $table->string('sidebar_active_link_background_color')->default('#3b82f6')->after('sidebar_link_text_hover_color');
            $table->string('sidebar_active_link_text_color')->default('#ffffff')->after('sidebar_active_link_background_color');
            $table->string('sidebar_active_link_border_top')->default('0px')->after('sidebar_active_link_text_color');
            $table->string('sidebar_active_link_border_right')->default('0px')->after('sidebar_active_link_border_top');
            $table->string('sidebar_active_link_border_bottom')->default('0px')->after('sidebar_active_link_border_right');
            $table->string('sidebar_active_link_border_left')->default('0px')->after('sidebar_active_link_border_bottom');
            $table->text('sidebar_link_padding')->default('12px 16px')->after('sidebar_active_link_border_left');
            $table->text('sidebar_link_margin')->default('0px 0px 0px 0px')->after('sidebar_link_padding');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->dropColumn([
                'sidebar_link_background_color',
                'sidebar_link_background_hover_color',
                'sidebar_link_text_color',
                'sidebar_link_text_hover_color',
                'sidebar_active_link_background_color',
                'sidebar_active_link_text_color',
                'sidebar_active_link_border_top',
                'sidebar_active_link_border_right',
                'sidebar_active_link_border_bottom',
                'sidebar_active_link_border_left',
                'sidebar_link_padding',
                'sidebar_link_margin'
            ]);
        });
    }
};
