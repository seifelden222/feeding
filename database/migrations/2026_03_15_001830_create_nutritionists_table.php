<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Original Arabic table: الاخصائي_الغذائي
     */
    public function up(): void
    {
        Schema::create('nutritionists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Original Arabic: اسم الاخصائي');
            $table->string('phone')->comment('Original Arabic: رقم التواصل');
            $table->string('specialization')->comment('Original Arabic: التخصص');
            $table->string('experience')->comment('Original Arabic: الخبرة');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutritionists');
    }
};
