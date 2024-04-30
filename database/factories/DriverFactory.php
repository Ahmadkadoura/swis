<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->text(20),
            'vehicle_number'=>fake()->text(20),
            'national_id'=>fake()->text(20),
            'transportation_company_name'=>fake()->text(20),
            'phone'=>fake()->text(20),
        ];
    }
}
