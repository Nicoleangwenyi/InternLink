<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve roles
        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();
        $employerRole = Role::where('name', 'employer')->first();

        // Seed admin user
        User::updateOrCreate([
            'email' => 'savayi2003@gmail.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Str8up@1234'), // Hash the password
            'role_id' => $adminRole->id,
            'active' => true,
        ]);

        // Seed student user
        User::updateOrCreate([
            'email' => 'student@example.com',
        ], [
            'name' => 'Student User',
            'password' => Hash::make('password123'), // Hash the password
            'role_id' => $studentRole->id,
            'active' => true,
        ]);

        // Seed employer user
        User::updateOrCreate([
            'email' => 'employer@example.com',
        ], [
            'name' => 'Employer User',
            'password' => Hash::make('password123'), // Hash the password
            'role_id' => $employerRole->id,
            'active' => true,
        ]);
    }
}
