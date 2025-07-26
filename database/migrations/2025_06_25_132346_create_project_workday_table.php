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
    Schema::create('project_workday', function (Blueprint $table) {
        $table->foreignId('project_id')->constrained()->cascadeOnDelete();
        $table->foreignId('workday_id')->constrained('work_days')->cascadeOnDelete();
        $table->primary(['project_id', 'workday_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_workday');
    }
};
