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
        Schema::create('patient_diseases', function (Blueprint $table) {
            $table->foreignId('patient_user_id')->constrained('patient_profiles', 'user_id')->cascadeOnDelete();
            $table->foreignId('disease_id')->constrained('disease_catalog')->restrictOnDelete();
            $table->date('diagnosed_at')->nullable();
            $table->string('severity', 20)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->primary(['patient_user_id', 'disease_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_diseases');
    }
};
