<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WarehouseItem>
 */
class WarehouseItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'warehouse_id' =>Warehouse::inRandomOrder()->value('id'),
            'item_id' => Item::inRandomOrder()->value('id'),
            'quantity' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
