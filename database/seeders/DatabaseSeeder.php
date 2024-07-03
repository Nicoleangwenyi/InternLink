<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesTableSeeder::class);
        //$this->call(AdminSeeder::class);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'savayi2003@gmail.com',
            'password'=>'Str8up@1234',
        ]);
    }

}
