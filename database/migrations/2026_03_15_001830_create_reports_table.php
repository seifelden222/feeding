<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Original Arabic table: تقارير
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('report_date')->comment('Original Arabic: التاريخ');
            $table->decimal('current_weight', 8, 2)->comment('Original Arabic: الوزن_الحالي');
            $table->text('notes')->nullable()->comment('Original Arabic: ملاحظات');
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete()->comment('Original Arabic: رقم المستخدم');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
