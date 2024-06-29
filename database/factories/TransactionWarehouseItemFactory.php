<?php

namespace Database\Factories;

use App\Enums\transactionModeType;
use App\Enums\transactionType;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionWarehouseItem>
 */
class TransactionWarehouseItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => Transaction::inRandomOrder()->first()->id,
            'warehouse_id' => Warehouse::inRandomOrder()->first()->id,
            'item_id' =>Item::inRandomOrder()->first()->id ,
            'quantity' => $this->faker->numberBetween(10, 1000),
            'transaction_type' => $this->faker->randomElement(transactionType::class),
            'transaction_mode_type' => $this->faker->randomElement(transactionModeType::class),
        ];
    }
}
