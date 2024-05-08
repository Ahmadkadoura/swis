<?php

namespace Database\Seeders;

use App\Models\WarehouseItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WarehouseItem::factory()->count(20)->create();

    }
}
