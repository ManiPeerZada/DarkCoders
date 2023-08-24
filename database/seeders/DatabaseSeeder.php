<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\User_role;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'type' => 'Admin',
            'role' => '1',
            'status' => 'Active',            
            'password' => Hash::make('12345678'),
        ]);
        Role::insert([
            'role' => 'Super Admin',
        ]);
        User_role::insert([
            'user_id' => '1',
            'manage_pricing' => '1',
            'manage_files' => '1',
        ]);
    }
}
