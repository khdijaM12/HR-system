<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('insurance_policies', function (Blueprint $table) {
    $table->id();
    $table->foreignId('insurance_type_id')->constrained()->onDelete('restrict');
    $table->foreignId('company_id')->constrained()->onDelete('restrict');
    $table->string('company_name');
    $table->decimal('contribution_percent', 5, 2);
    $table->decimal('employee_percent', 5, 2);
    $table->date('start_date');
    $table->date('end_date')->nullable();
    $table->timestamps();
    $table->softDeletes(); // لتفعيل soft delete
});

    }

    public function down(): void
    {
        Schema::dropIfExists('insurance_policies');
    }
};
