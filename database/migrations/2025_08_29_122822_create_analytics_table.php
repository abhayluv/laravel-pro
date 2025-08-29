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
        Schema::create('analytics', function (Blueprint $table) {
            $table->id();
            
            // Basic analytics data
            $table->string('session_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('page_url');
            $table->string('page_title')->nullable();
            $table->string('referrer')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('device_type')->nullable(); // desktop, mobile, tablet
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            
            // Traffic source data
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_term')->nullable();
            $table->string('utm_content')->nullable();
            
            // Engagement metrics
            $table->integer('time_on_page')->nullable(); // in seconds
            $table->boolean('is_bounce')->default(true);
            $table->boolean('is_new_visitor')->default(true);
            
            // Event tracking
            $table->string('event_type')->nullable(); // pageview, click, form_submit, etc.
            $table->string('event_category')->nullable();
            $table->string('event_action')->nullable();
            $table->string('event_label')->nullable();
            $table->integer('event_value')->nullable();
            
            // Timestamps
            $table->timestamp('visited_at');
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['visited_at']);
            $table->index(['page_url']);
            $table->index(['user_id']);
            $table->index(['session_id']);
            $table->index(['utm_source']);
            $table->index(['device_type']);
            $table->index(['country']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics');
    }
};
