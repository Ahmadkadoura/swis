<?php

namespace Database\Factories;

use App\Enums\transactionModeType;
use App\Enums\transType;
use App\Models\Transaction;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionWarehouse>
 */
class TransactionWarehouseFactory extends Factory
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
            'transaction_type' => $this->faker->randomElement(transType::class),
            'transaction_mode_type' => $this->faker->randomElement(transactionModeType::class),
        ];
    }
}
