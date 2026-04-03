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
        Schema::create('patient_allergies', function (Blueprint $table) {
            $table->foreignId('patient_user_id')->constrained('patient_profiles', 'user_id')->cascadeOnDelete();
            $table->foreignId('allergy_id')->constrained('allergy_catalog')->restrictOnDelete();
            $table->text('reaction_notes')->nullable();
            $table->timestamps();

            $table->primary(['patient_user_id', 'allergy_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_allergies');
    }
};
