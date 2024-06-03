<?php

namespace Database\Seeders;

use App\Models\donorItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonorItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        donorItem::factory()->count(50)->create();

    }
}
