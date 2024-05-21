<?php

namespace Database\Factories;

use App\Enums\sector_Type;
use App\Enums\sectorType;
use App\Enums\unitType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->word, // Assuming you want unique codes
            'sectorType' =>$this->faker->randomElement(sectorType::class), // Get random sector type value
            'unitType' =>$this->faker->randomElement(unitType::class), // Get random unit type value
            'name' => $this->faker->word,
            'size' => $this->faker->randomFloat(2, 0, 100), // Random size between 0 and 100
            'weight' => $this->faker->randomFloat(2, 0, 100), // Random weight between 0 and 100
            'quantity' => $this->faker->numberBetween(10, 1000),// Random quantity between 10 and 1000

        ];
    }
}
