<?php

namespace Database\Factories;

use App\Enums\transactionStatusType;
use App\Http\services\QRCodeService;
use App\Models\Donor;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Warehouse;
use App\Traits\QrCodeHelper;
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
            'user_id' => User::inRandomOrder()->first()->id,
            'is_convoy' => $this->faker->boolean(),
            'notes' => $this->faker->optional()->sentence,
            'code' => $this->faker->word,
            'status' => $this->faker->randomElement(transactionStatusType::class),
            'date' => $this->faker->date(),
            'waybill_num' => $this->faker->numberBetween(1000, 9999),
            'waybill_img' => $this->faker->imageUrl(),
            'qr_code' => null,
            'CTN'=>$this->faker->numberBetween(1000, 9999),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Transaction $transaction) {
            $qrCodeService = app(QRCodeService::class);
            $qrCodePath = $qrCodeService->generateQRCode( $transaction);

            $transaction->qr_code = $qrCodePath;
            $transaction->save();
        });
    }
}
