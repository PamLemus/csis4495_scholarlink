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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('session_id');
            $table->unsignedBigInteger('session_course_id');
            $table->foreign('session_course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('session_tutor_id');
            $table->foreign('session_tutor_id')->references('tutor_id')->on('tutors')->onDelete('cascade');
            $table->unsignedBigInteger('session_user_id');
            $table->foreign('session_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('content')->nullable();
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
        Schema::dropIfExists('sessions');
    }
};
