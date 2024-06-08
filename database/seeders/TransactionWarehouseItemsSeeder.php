<?php

namespace Database\Seeders;

use App\Models\transactionWarehouseItems;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionWarehouseItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transactionWarehouseItems::factory()->count(15)->create();

    }
}
