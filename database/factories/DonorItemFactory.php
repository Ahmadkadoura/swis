<?php

namespace Database\Factories;

use App\Models\Donor;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonorItem>
 */
class DonorItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donor_id' => Donor::inRandomOrder()->first()->id ,
            'item_id' => Item::inRandomOrder()->first()->id ,
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
