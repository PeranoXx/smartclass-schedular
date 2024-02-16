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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained();
            $table->foreignId('class_room_id')->constrained();
            $table->foreignId('batch_id')->constrained();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('contact_number')->nullable();
            $table->string('username');
            $table->string('password');
            $table->enum('gender',['male','female','others']);
            $table->date('birth_date');
            $table->string('father_name');
            $table->string('father_contact_number');
            $table->string('mother_name');
            $table->string('mother_contact_number');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
