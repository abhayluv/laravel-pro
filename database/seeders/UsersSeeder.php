<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get roles
        $adminRole = Role::where('slug', 'admin')->first();
        $managerRole = Role::where('slug', 'manager')->first();
        $employeeRole = Role::where('slug', 'employee')->first();
        $hrRole = Role::where('slug', 'hr')->first();

        // Get permissions
        $permissions = Permission::all()->keyBy('name');

        // Create Admin User
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Administrator',
                'first_name' => 'System',
                'last_name' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+1234567890',
                'gender' => 1,
                'date_of_birth' => '1990-01-01',
                'address' => '123 Admin Street, Admin City, AC 12345',
                'role_id' => $adminRole->id,
                'email_verified_at' => now(),
            ]
        );

        // Create Manager User
        $managerUser = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'John Manager',
                'first_name' => 'John',
                'last_name' => 'Manager',
                'email' => 'manager@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+1234567891',
                'gender' => 1,
                'date_of_birth' => '1985-05-15',
                'address' => '456 Manager Avenue, Manager Town, MT 67890',
                'role_id' => $managerRole->id,
                'email_verified_at' => now(),
            ]
        );

        // Create Employee User
        $employeeUser = User::firstOrCreate(
            ['email' => 'employee@example.com'],
            [
                'name' => 'Jane Employee',
                'first_name' => 'Jane',
                'last_name' => 'Employee',
                'email' => 'employee@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+1234567892',
                'gender' => 2,
                'date_of_birth' => '1992-08-20',
                'address' => '789 Employee Road, Employee Village, EV 11111',
                'role_id' => $employeeRole->id,
                'email_verified_at' => now(),
            ]
        );

        // Create HR User
        $hrUser = User::firstOrCreate(
            ['email' => 'hr@example.com'],
            [
                'name' => 'Sarah HR',
                'first_name' => 'Sarah',
                'last_name' => 'HR',
                'email' => 'hr@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+1234567893',
                'gender' => 2,
                'date_of_birth' => '1988-12-10',
                'address' => '321 HR Boulevard, HR District, HR 22222',
                'role_id' => $hrRole->id,
                'email_verified_at' => now(),
            ]
        );

        // Assign permissions to roles
        $this->assignPermissionsToRoles($adminRole, $managerRole, $employeeRole, $hrRole, $permissions);

        // Create additional sample users for each role
        $this->createSampleUsers($adminRole, $managerRole, $employeeRole, $hrRole);
    }

    /**
     * Assign permissions to roles based on their hierarchy
     */
    private function assignPermissionsToRoles($adminRole, $managerRole, $employeeRole, $hrRole, $permissions)
    {
        // Admin gets all permissions
        $adminPermissions = $permissions->pluck('id')->toArray();
        $adminRole->permissions()->sync($adminPermissions);

        // Manager gets most permissions except user management
        $managerPermissions = $permissions->filter(function ($permission) {
            return !str_contains($permission->name, 'users.');
        })->pluck('id')->toArray();
        $managerRole->permissions()->sync($managerPermissions);

        // Employee gets basic view permissions and master form permissions
        $employeePermissions = $permissions->filter(function ($permission) {
            return in_array($permission->name, [
                'configuration.view',
                'master.view',
                'master.add',
                'master.edit',
            ]);
        })->pluck('id')->toArray();
        $employeeRole->permissions()->sync($employeePermissions);

        // HR gets user management and basic permissions
        $hrPermissions = $permissions->filter(function ($permission) {
            return in_array($permission->name, [
                'configuration.view',
                'users.view',
                'users.add',
                'users.edit',
                'users.status',
                'master.view',
                'master.add',
                'master.edit',
            ]);
        })->pluck('id')->toArray();
        $hrRole->permissions()->sync($hrPermissions);
    }

    /**
     * Create additional sample users for each role
     */
    private function createSampleUsers($adminRole, $managerRole, $employeeRole, $hrRole)
    {
        // Additional Admin Users
        $adminUsers = [
            [
                'name' => 'Alex Admin',
                'first_name' => 'Alex',
                'last_name' => 'Admin',
                'email' => 'alex.admin@example.com',
                'phone' => '+1234567894',
                'gender' => 1,
                'date_of_birth' => '1987-03-25',
                'address' => '654 Admin Lane, Admin Borough, AB 33333',
            ],
            [
                'name' => 'Maria Admin',
                'first_name' => 'Maria',
                'last_name' => 'Admin',
                'email' => 'maria.admin@example.com',
                'phone' => '+1234567895',
                'gender' => 2,
                'date_of_birth' => '1983-07-12',
                'address' => '987 Admin Court, Admin County, AC 44444',
            ],
        ];

        foreach ($adminUsers as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                array_merge($userData, [
                    'password' => Hash::make('password123'),
                    'role_id' => $adminRole->id,
                    'email_verified_at' => now(),
                ])
            );
        }

        // Additional Manager Users
        $managerUsers = [
            [
                'name' => 'David Manager',
                'first_name' => 'David',
                'last_name' => 'Manager',
                'email' => 'david.manager@example.com',
                'phone' => '+1234567896',
                'gender' => 1,
                'date_of_birth' => '1986-11-08',
                'address' => '147 Manager Street, Manager City, MC 55555',
            ],
            [
                'name' => 'Lisa Manager',
                'first_name' => 'Lisa',
                'last_name' => 'Manager',
                'email' => 'lisa.manager@example.com',
                'phone' => '+1234567897',
                'gender' => 2,
                'date_of_birth' => '1989-04-30',
                'address' => '258 Manager Road, Manager Town, MT 66666',
            ],
        ];

        foreach ($managerUsers as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                array_merge($userData, [
                    'password' => Hash::make('password123'),
                    'role_id' => $managerRole->id,
                    'email_verified_at' => now(),
                ])
            );
        }

        // Additional Employee Users
        $employeeUsers = [
            [
                'name' => 'Mike Employee',
                'first_name' => 'Mike',
                'last_name' => 'Employee',
                'email' => 'mike.employee@example.com',
                'phone' => '+1234567898',
                'gender' => 1,
                'date_of_birth' => '1995-02-14',
                'address' => '369 Employee Avenue, Employee City, EC 77777',
            ],
            [
                'name' => 'Emma Employee',
                'first_name' => 'Emma',
                'last_name' => 'Employee',
                'email' => 'emma.employee@example.com',
                'phone' => '+1234567899',
                'gender' => 2,
                'date_of_birth' => '1993-09-22',
                'address' => '741 Employee Lane, Employee Village, EV 88888',
            ],
            [
                'name' => 'Tom Employee',
                'first_name' => 'Tom',
                'last_name' => 'Employee',
                'email' => 'tom.employee@example.com',
                'phone' => '+1234567900',
                'gender' => 1,
                'date_of_birth' => '1991-06-18',
                'address' => '852 Employee Court, Employee District, ED 99999',
            ],
        ];

        foreach ($employeeUsers as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                array_merge($userData, [
                    'password' => Hash::make('password123'),
                    'role_id' => $employeeRole->id,
                    'email_verified_at' => now(),
                ])
            );
        }

        // Additional HR Users
        $hrUsers = [
            [
                'name' => 'Rachel HR',
                'first_name' => 'Rachel',
                'last_name' => 'HR',
                'email' => 'rachel.hr@example.com',
                'phone' => '+1234567901',
                'gender' => 2,
                'date_of_birth' => '1984-10-05',
                'address' => '963 HR Street, HR City, HC 00000',
            ],
            [
                'name' => 'Chris HR',
                'first_name' => 'Chris',
                'last_name' => 'HR',
                'email' => 'chris.hr@example.com',
                'phone' => '+1234567902',
                'gender' => 1,
                'date_of_birth' => '1986-12-25',
                'address' => '159 HR Avenue, HR Town, HT 11111',
            ],
        ];

        foreach ($hrUsers as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                array_merge($userData, [
                    'password' => Hash::make('password123'),
                    'role_id' => $hrRole->id,
                    'email_verified_at' => now(),
                ])
            );
        }
    }
}
