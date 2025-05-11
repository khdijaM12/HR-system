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
        Schema::create('job_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->onDelete('restrict');
            $table->foreignId('job_title_id')->constrained()->onDelete('restrict');
            $table->foreignId('level_id')->constrained()->onDelete('restrict');
            $table->decimal('base_salary', 10, 2);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_structures');
    }
};
