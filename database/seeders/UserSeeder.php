<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@mailinator.com',
            'phone_no' => '9123456789',
            'email_verified_at' => now(),
            'password' => Hash::make('Pa$$word'),
            'role' => 'admin',
            'pin_code_id' => 10
        ]);
        // Create 30 fake users
        $users = \App\Models\User::factory(30)->create();
    }
}
