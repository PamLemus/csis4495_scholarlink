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
        Schema::table('tutor_courses', function (Blueprint $table) {
           
            $table->string('p_course_school')->after('tc_tutor_id')->nullable();
            $table->string('p_course_teacher')->after('p_course_school')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutor_courses', function (Blueprint $table) {
            
            $table->dropColumn('p_course_school');
            $table->dropColumn('p_course_teacher');

        });
    }
};
