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
        Schema::create('lacture_timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained();
            $table->string('lacture_name');
            $table->time('start_time');
            $table->time('end_time');
            $table->longText('weeks');
            $table->boolean('is_break');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lacture_timings');
    }
};
