<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'phone' => '1234567890',
            'email' => 'admin@test.com',
            'type' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // User::factory()->create([
        //     'name' => 'Juan',
        //     'username' => 'juan123',
        //     'phone' => '1234567890',
        //     'email' => 'juan@test.com',
        //     'type' => 'doctor',
        //     'password' => Hash::make('password'),
        // ]);

        // User::factory()->create([
        //     'name' => 'Alejandro',
        //     'username' => 'alejandro123',
        //     'phone' => '1234567890',
        //     'email' => 'alejandro@test.com',
        //     'type' => 'paciente',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
