<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // linked with users table
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('roll_no')->unique();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_no')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('students');
    }
};
