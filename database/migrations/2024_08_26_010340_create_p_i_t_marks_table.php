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
        Schema::create('p_i_t_marks', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_mark');
            $table->float('sixty_percent');
            $table->integer('assignment_mark');
            $table->string('grade');
            $table->integer('total_score');
            $table->float('grade_score');
            $table->float('grade_point');
            $table->string('semester');
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_i_t_marks');
    }
};
