<?php

namespace Database\Seeders;

use App\Models\transactionWarehouseItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionWarehouseItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transactionWarehouseItem::factory()->count(15)->create();

    }
}
