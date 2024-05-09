<?php

namespace Database\Seeders;

use App\Models\transactionDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transactionDriver::factory()->count(10)->create();
    }
}
