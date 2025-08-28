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
        Schema::create('master_forms', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->enum('gender', ['1', '2', '3'])->comment('1-male, 2-female, 3-other');
            $table->unsignedBigInteger('single_selection')->nullable();
            $table->json('multi_selection')->nullable();
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->json('languages')->nullable();
            $table->string('password');
            $table->date('date_field')->nullable();
            $table->time('time_field')->nullable();
            $table->dateTime('datetime_field')->nullable();
            $table->date('date_range_start')->nullable();
            $table->date('date_range_end')->nullable();
            $table->integer('range_slider_value')->default(50);
            $table->text('address')->nullable();
            $table->text('signature')->nullable();
            $table->longText('text_editor')->nullable();
            $table->integer('star_rating')->default(0);
            $table->string('captcha')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_forms');
    }
};
