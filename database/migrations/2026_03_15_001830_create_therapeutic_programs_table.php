<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Original Arabic table: برامج_علاجيه
     */
    public function up(): void
    {
        Schema::create('therapeutic_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Original Arabic: اسم البرنامج');
            $table->string('program_type')->comment('Original Arabic: نوع البرنامج');
            $table->unsignedInteger('sessions_per_week')->comment('Original Arabic: عدد_المرات_في_الاسبوع');
            $table->unsignedInteger('duration_minutes')->comment('Original Arabic: مدة_التمرين_بالدقائق');
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete()->comment('Original Arabic: رقم المستخدم');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapeutic_programs');
    }
};
