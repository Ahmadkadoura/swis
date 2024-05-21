<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use MatanYadaev\EloquentSpatial\Objects\Point;

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
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'capacity' => $this->faker->numberBetween(100, 1000),
            'parent_id' => $parentId,
            'user_id' => User::inRandomOrder()->first()->id,
            'location' => new Point($this->faker->longitude, $this->faker->latitude),
            'is_Distribution_point' => $this->faker->boolean(),
        ];
    }
}
