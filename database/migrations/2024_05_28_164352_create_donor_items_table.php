<?php

use App\Models\Donor;
use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donor_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Donor::class);
            $table->foreignIdFor(Item::class);
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donor_items');
    }
};
