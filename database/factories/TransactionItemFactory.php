<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionItem>
 */
class TransactionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id' =>Item::inRandomOrder()->first()->id ,
            'transaction_id' => Transaction::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(10, 1000),// Random quantity between 10 and 1000

        ];
    }
}
