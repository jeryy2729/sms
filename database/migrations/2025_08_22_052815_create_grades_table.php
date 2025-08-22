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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
    $table->string('name'); // e.g., A+, A, B
    $table->integer('mark_from'); // e.g., 90
    $table->integer('mark_to');   // e.g., 100
    $table->string('remarks')->nullable(); // e.g., Excellent

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
