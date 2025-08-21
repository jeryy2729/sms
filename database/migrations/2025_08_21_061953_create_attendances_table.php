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
       Schema::create('attendances', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('student_id');   // links to student
    $table->unsignedBigInteger('class_id');     // class
    $table->unsignedBigInteger('section_id');   // section
    $table->date('date');                       // attendance date
    $table->enum('status', ['present', 'absent', 'late', 'leave'])->default('present');
    $table->timestamps();
});

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
