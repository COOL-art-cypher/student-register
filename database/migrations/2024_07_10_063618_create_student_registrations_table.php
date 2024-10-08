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
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('academic_year_id'); // corrected column name
            $table->string('specialist');
            $table->integer('roll_no');
            $table->string('father_name');
            $table->string('father_nrc_photo');
            $table->string('father_nrc_back');
            $table->string('mother_name');
            $table->string('mother_nrc_photo');
            $table->string('mother_nrc_back');
            $table->string('student_phone');
            $table->string('parent_phone');
            $table->text('address');
            $table->string('student_image');
            $table->string('student_nrc_photo');
            $table->string('student_nrc_back');
            $table->string('family');
            $table->string('payment_img');
            $table->string('status')->default('pending');
            $table->string('stop')->default('no');
            $table->timestamps();
            $table->foreign('academic_year_id')->references('id')->on('academic_years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registrations');
    }
};
