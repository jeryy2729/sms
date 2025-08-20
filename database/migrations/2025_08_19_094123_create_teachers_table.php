<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('employee_id')->unique();
                        $table->string('phone_no')->unique();
            $table->string('qualification')->nullable();
            $table->string('department')->nullable();
            $table->date('join_date')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('teachers'); }
};
