<?php

namespace Database\Seeders;

use App\Models\transactionWarehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transactionWarehouse::factory()->count(15)->create();

    }
}
