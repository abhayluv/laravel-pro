<?php

namespace Database\Seeders;

use App\Models\MasterForm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 sample master forms
        MasterForm::factory(20)->create();
    }
}
