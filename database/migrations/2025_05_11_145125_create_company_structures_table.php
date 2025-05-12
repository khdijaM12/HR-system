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
        Schema::create('company_structures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('structure_level_id')->constrained('structure_levels')->cascadeOnDelete();
             $table->foreignId('parent_id')->nullable()->constrained('company_structures'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_structures');
    }
};
