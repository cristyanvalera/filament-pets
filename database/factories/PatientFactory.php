<?php

namespace Database\Factories;

use App\Filament\Enums\PetType;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'type' => fake()->randomElement(PetType::cases())->name,
            'date_of_birth' => fake()->dateTimeBetween(startDate: '-2 years'),
            'owner_id' => Owner::factory()->create(),
        ];
    }
}
