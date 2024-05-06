<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RolesPermssionsSeeder::class]);
        $this->call([userSeeder::class]);
        $this->call([DriverSeeder::class]);
        $this->call([BranchSeeder::class]);
        $this->call([ItemSeeder::class]);
        $this->call([WarehouseSedder::class]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
