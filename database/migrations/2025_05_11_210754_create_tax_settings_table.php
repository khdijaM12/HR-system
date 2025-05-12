<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('tax_settings', function (Blueprint $table) {
        $table->id(); // مفتاح رئيسي
        $table->foreignId('company_id')->constrained()->onDelete('cascade'); // مفتاح أجنبي لربط الضرائب بالشركة
        $table->string('name'); // اسم الضريبة مثل "ضريبة الدخل"
        $table->decimal('rate_percent', 5, 2); // نسبة الضريبة مثل 15.00
        $table->boolean('applies_to_salary')->default(false); // هل تخصم من الراتب أم لا
        $table->text('description')->nullable(); // وصف للضريبة
        $table->timestamps(); // طوابع الوقت
    });
}


    public function down(): void
    {
        Schema::dropIfExists('tax_settings');
    }
};
