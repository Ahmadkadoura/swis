<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $parentId = $this->faker->numberBetween(0, 10);
        if ($parentId === 0) {
            $parentId = null;
        }

        return [
            'name' => $this->faker->company,
            'code' => $this->faker->unique()->word,
            'location' =>null,
            'branch_id' => $this->faker->numberBetween(1, 10),
            'capacity' => $this->faker->numberBetween(100, 1000),
            'parent_id' => $parentId,
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
            'is_Distribution_point' => $this->faker->boolean(),
        ];
    }
}
