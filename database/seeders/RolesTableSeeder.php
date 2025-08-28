<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin', 'slug' => 'admin', 'status' => true],
            ['name' => 'Manager', 'slug' => 'manager', 'status' => true],
            ['name' => 'Employee', 'slug' => 'employee', 'status' => true],
            ['name' => 'HR', 'slug' => 'hr', 'status' => true],
        ];

        foreach ($roles as $data) {
            Role::firstOrCreate(['slug' => $data['slug']], $data);
        }
    }
}


