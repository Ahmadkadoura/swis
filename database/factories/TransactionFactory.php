<?php

namespace Database\Factories;

use App\Enums\transactionStatusType;
use App\Models\Donor;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'warehouse_id' =>Warehouse::inRandomOrder()->first()->id ,
            'donor_id' => Donor::inRandomOrder()->first()->id,
            'is_convoy' => $this->faker->boolean(),
            'notes' => $this->faker->optional()->sentence,
            'code' => $this->faker->word,
            'status' => $this->faker->randomElement(transactionStatusType::class),
            'date' => $this->faker->date(),
            'waybill_num' => $this->faker->numberBetween(1000, 9999),
            'waybill_img' => $this->faker->imageUrl(),
            'qr_code' => $this->faker->imageUrl(),
        ];
    }
}
