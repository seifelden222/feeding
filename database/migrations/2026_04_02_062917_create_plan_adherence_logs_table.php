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
        Schema::create('plan_adherence_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('patient_plan_assignments')->cascadeOnDelete();
            $table->date('log_date');
            $table->unsignedTinyInteger('adherence_score')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('created_by_user_id')->constrained('users')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_adherence_logs');
    }
};
