<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        // Create default configuration if none exists
        if (Configuration::count() === 0) {
            Configuration::createDefault();
        }
    }
}
