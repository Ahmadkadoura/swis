<?php

use App\Models\Branch;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->point('location')->nullable();
            $table->foreignIdFor(Branch::class);
            $table->integer('capacity');
            $table->bigInteger('parent_id')->nullable();
            $table->foreignId(User::class);
            $table->boolean('is_Distribution_point');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
