<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('subject_id');

            $table->integer('marks_obtained');
            $table->integer('total_marks')->default(100); // optional, default 100
            $table->string('exam_type')->nullable(); // e.g. Midterm, Final, Quiz
            $table->date('exam_date')->nullable();

            $table->timestamps();

            // No foreign key constraints since you said you don’t want them
            // But adding indexes for performance:
            $table->index('student_id');
            $table->index('class_id');
            $table->index('section_id');
            $table->index('subject_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
}
