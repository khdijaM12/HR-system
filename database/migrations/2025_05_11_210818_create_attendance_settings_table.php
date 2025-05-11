<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('attendance_settings', function (Blueprint $table) {
        $table->id(); // مفتاح رئيسي
        $table->foreignId('company_id')->constrained()->onDelete('cascade'); // مفتاح أجنبي لربط الحضور والانصراف بالشركة
        $table->integer('max_late_minutes')->default(0); // الحد الأقصى للدقائق المسموح بها للتأخير
        $table->integer('max_absent_days')->default(0); // الحد الأقصى للأيام المسموح بها للغياب
        $table->boolean('overtime_enabled')->default(false); // هل يتم احتساب ساعات إضافية؟
        $table->boolean('allow_shift_swap')->default(false); // هل يسمح بتبديل الشفتات؟
        $table->text('description')->nullable(); // وصف للسياسات المتعلقة بالحضور والانصراف
        $table->timestamps(); // طوابع الوقت
    });
}


    
    public function down(): void
    {
        Schema::dropIfExists('attendance_settings');
    }
};
