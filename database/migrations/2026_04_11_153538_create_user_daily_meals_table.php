<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_daily_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('meal_type', 30); // breakfast, lunch, dinner, snack
            $table->unsignedInteger('calories')->nullable();
            $table->decimal('protein_g', 8, 2)->nullable();
            $table->decimal('carb_g', 8, 2)->nullable();
            $table->decimal('fat_g', 8, 2)->nullable();
            $table->text('notes')->nullable();
            $table->string('image_path')->nullable();
            $table->date('meal_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_daily_meals');
    }
};
