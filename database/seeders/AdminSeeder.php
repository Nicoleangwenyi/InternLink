<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin ',
            'email' => 'savayi2003@gmail.com',
            'password' => Hash::make('Str8up@1234'),
            // 'role_id' => $admin->id,
        ]);
    }
}
