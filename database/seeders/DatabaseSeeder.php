<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
{
    User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'role' => 'admin'
    ]);

    User::create([
        'name' => 'Manager',
        'email' => 'manager@example.com',
        'password' => Hash::make('password'),
        'role' => 'manager'
    ]);

    User::create([
        'name' => 'Staff',
        'email' => 'staff@example.com',
        'password' => Hash::make('password'),
        'role' => 'staff'
    ]);
}
}
