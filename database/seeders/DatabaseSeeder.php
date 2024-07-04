<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);

        // Retrieve admin role
        $adminRole = Role::where('name', 'Admin')->first();

        // Admin data
        User::updateOrCreate([
            'email' => 'savayi2003@gmail.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Str8up@1234'), // Hash the password
            'role_id' => $adminRole->id, // Assign role_id directly if role_id column exists in users table
        ]);
    }
}
