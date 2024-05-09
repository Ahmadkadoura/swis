<?php

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
        Schema::create('transaction_warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Transaction::class);
            $table->foreignIdFor(\App\Models\Warehouse::class);
            $table->string('transaction_type');
            $table->string('transaction_mode_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_warehouses');
    }
};
