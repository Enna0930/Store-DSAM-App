<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::updateOrCreate(
            ['username' => 'sonnymata'],
            [
                'name' => 'Sonny Mata',
                'email' => 'sonnymata@dsam-packaging.com',
                'password' => Hash::make('genmgr'),
                'account_type' => 'admin',
                'department' => 'General Management / Executive',
                'role_level' => 'executive',
                'is_approved' => true,
                'approved_at' => now(),
            ],
        );
    }
}
