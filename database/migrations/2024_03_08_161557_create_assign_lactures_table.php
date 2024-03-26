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
        Schema::create('assign_lactures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained();
            $table->foreignId('class_room_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->string('no_of_lectures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_lactures');
    }
};
