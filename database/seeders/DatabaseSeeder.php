<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin (login: admin / admin123)
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => 'admin123', // otomatis di-hash oleh cast 'hashed' di model User
                'role' => 'admin',
            ]
        );

        $this->call(PerangkatSeeder::class);
    }
}
