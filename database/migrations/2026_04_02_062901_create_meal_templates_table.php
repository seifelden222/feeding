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
        Schema::create('meal_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('meal_type', 30);
            $table->text('meal_notes')->nullable();
            $table->unsignedInteger('default_calories')->nullable();
            $table->foreignId('created_by_specialist_user_id')
                ->nullable()
                ->constrained('specialist_profiles', 'user_id')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_templates');
    }
};
