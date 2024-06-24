<?php

namespace Database\Seeders;

use App\Models\{Patient, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Cristyan Valera',
            'email' => 'cristyanvalera@test.com',
        ]);

        Patient::factory(9)->create();
    }
}
