<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterForm>
 */
class MasterFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['1', '2', '3']),
            'single_selection' => fake()->optional()->numberBetween(1, 5),
            'multi_selection' => fake()->optional()->randomElements([1, 2, 3, 4, 5], fake()->numberBetween(1, 3)),
            'image_path' => null, // Will be handled separately if needed
            'video_path' => null, // Will be handled separately if needed
            'languages' => fake()->optional()->randomElements(['English', 'Hindi', 'Gujarati'], fake()->numberBetween(1, 3)),
            'password' => Hash::make('password123'),
            'date_field' => fake()->optional()->date(),
            'time_field' => fake()->optional()->time(),
            'datetime_field' => fake()->optional()->dateTime(),
            'date_range_start' => fake()->optional()->date(),
            'date_range_end' => fake()->optional()->date(),
            'range_slider_value' => fake()->numberBetween(0, 100),
            'address' => fake()->optional()->address(),
            'signature' => null, // Will be handled separately if needed
            'text_editor' => fake()->optional()->paragraphs(3, true),
            'star_rating' => fake()->numberBetween(0, 5),
            'captcha' => fake()->optional()->regexify('[A-Z0-9]{6}'),
            'status' => fake()->boolean(80), // 80% chance of being active
        ];
    }
}
