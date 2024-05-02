<?php

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
            $table->point('location');
            $table->foreignId('branch_id')->constrained('branches');
            $table->integer('capacity');
            $table->bigInteger('parent_id');
            $table->foreignId('user_id')->constrained('users');
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
