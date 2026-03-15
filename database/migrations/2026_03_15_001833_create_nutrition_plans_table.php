<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Original Arabic table: الخطة_الغذائية
     */
    public function up(): void
    {
        Schema::create('nutrition_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Original Arabic: اسم الخطة');
            $table->decimal('daily_calories', 10, 2)->comment('Original Arabic: السعرات_اليومية');
            $table->unsignedInteger('meals_count')->comment('Original Arabic: عدد_الوجبات');
            $table->text('meal_description')->comment('Original Arabic: وصف_كل_وجبة');
            $table->date('start_date')->comment('Original Arabic: تاريخ_البداية');
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete()->comment('Original Arabic: رقم المستخدم');
            $table->foreignId('nutritionist_id')->constrained('nutritionists')->cascadeOnDelete()->comment('Original Arabic: رقم الاخصائي');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_plans');
    }
};
