<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $definitions = [
            // Configuration module
            ['name' => 'configuration.view', 'module' => 'configuration'],
            ['name' => 'configuration.edit', 'module' => 'configuration'],
            // Roles module
            ['name' => 'roles.view', 'module' => 'roles'],
            ['name' => 'roles.add', 'module' => 'roles'],
            ['name' => 'roles.edit', 'module' => 'roles'],
            ['name' => 'roles.delete', 'module' => 'roles'],
            ['name' => 'roles.status', 'module' => 'roles'],
            // Users module
            ['name' => 'users.view', 'module' => 'users'],
            ['name' => 'users.add', 'module' => 'users'],
            ['name' => 'users.edit', 'module' => 'users'],
            ['name' => 'users.delete', 'module' => 'users'],
            ['name' => 'users.status', 'module' => 'users'],
            // Master Form module
            ['name' => 'master.view', 'module' => 'master'],
            ['name' => 'master.add', 'module' => 'master'],
            ['name' => 'master.edit', 'module' => 'master'],
            ['name' => 'master.delete', 'module' => 'master'],
            ['name' => 'master.status', 'module' => 'master'],
        ];

        foreach ($definitions as $def) {
            Permission::firstOrCreate(['name' => $def['name']], $def);
        }
    }
}


