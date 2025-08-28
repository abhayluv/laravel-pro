<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class AssignRoleToUser extends Command
{
    protected $signature = 'app:assign-role {email} {slug}';

    protected $description = 'Assign a role (by slug) to a user (by email)';

    public function handle(): int
    {
        $email = $this->argument('email');
        $slug = $this->argument('slug');

        $user = User::where('email', $email)->first();
        if (! $user) {
            $this->error('User not found');
            return self::FAILURE;
        }

        $role = Role::where('slug', $slug)->first();
        if (! $role) {
            $this->error('Role not found');
            return self::FAILURE;
        }

        $user->role()->associate($role);
        $user->save();

        $this->info("Assigned role '{$role->slug}' to user '{$user->email}'.");
        return self::SUCCESS;
    }
}


