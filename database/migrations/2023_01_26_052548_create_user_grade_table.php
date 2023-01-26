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
        Schema::create('user_grade', function (Blueprint $table) {
            $table->unsignedBigInteger('ug_user_id');
            $table->foreign('ug_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ug_tutor_id');
            $table->foreign('ug_tutor_id')->references('tutor_id')->on('tutors')->onDelete('cascade');
            $table->unsignedBigInteger('ug_course_id');
            $table->foreign('ug_course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->string('grade');
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
        Schema::dropIfExists('user_grade');
    }
};
