<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_courses', function (Blueprint $table) {
            $table->unsignedBigInteger('tc_course_id');
            $table->foreign('tc_course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('tc_tutor_id');
            $table->foreign('tc_tutor_id')->references('tutor_id')->on('tutors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutor_courses');
    }
};
