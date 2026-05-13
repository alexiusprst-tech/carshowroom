<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::firstOrCreate(
            ['email' => 'admin@mobcars.id'],
            [
                'name'     => 'Admin Urban Wheels',
                'password' => bcrypt('admin123456'),
                'is_admin' => true,
            ]
        );

        $this->call([
            CarSeeder::class,
        ]);
    }
}
