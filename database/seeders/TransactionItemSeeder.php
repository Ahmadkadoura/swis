<?php

namespace Database\Seeders;

use App\Models\transactionItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transactionItem::factory(10)->create();
    }
}
