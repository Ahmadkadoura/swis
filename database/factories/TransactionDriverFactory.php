<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionDriver>
 */
class TransactionDriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'driver_id' =>Driver::inRandomOrder()->first()->id ,
            'transaction_id' => Transaction::inRandomOrder()->first()->id
        ];
    }
}
