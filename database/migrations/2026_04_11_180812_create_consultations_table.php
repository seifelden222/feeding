<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id')->constrained('users')->cascadeOnDelete();
            $table->string('client_name');
            $table->string('consultation_type', 50)->default('initial'); // initial, followup, plan_edit
            $table->string('status', 20)->default('pending'); // pending, approved, in_progress, done
            $table->string('room_code')->unique();
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('joined_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
