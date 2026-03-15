<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Original Arabic table: الاستفسار
     */
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->date('inquiry_date')->comment('Original Arabic: التاريخ');
            $table->text('question_content')->comment('Original Arabic: محتوى_السؤال');
            $table->text('reply')->nullable()->comment('Original Arabic: الرد');
            $table->string('status')->comment('Original Arabic: الحالة');
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete()->comment('Original Arabic: رقم المستخدم');
            $table->foreignId('nutritionist_id')->nullable()->constrained('nutritionists')->nullOnDelete()->comment('Original Arabic: رقم الاخصائي');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
