<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Original Arabic table: المستخدم
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Original Arabic: اسم المستخدم');
            $table->unsignedInteger('age')->comment('Original Arabic: السن');
            $table->string('address')->comment('Original Arabic: العنوان');
            $table->string('gender')->comment('Original Arabic: النوع');
            $table->decimal('height', 8, 2)->comment('Original Arabic: الطول');
            $table->decimal('weight', 8, 2)->comment('Original Arabic: الوزن');
            $table->decimal('blood_sugar_level', 8, 2)->comment('Original Arabic: قياس السكر');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
