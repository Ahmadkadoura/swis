<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
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
            'parent_id' => $parentId,
            'phone' => $this->faker->unique()->phoneNumber,
            'address' => $this->faker->address,
        ];
    }
}
