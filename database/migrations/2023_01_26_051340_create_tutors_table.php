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
        Schema::create('tutors', function (Blueprint $table) {
            $table->id('tutor_id');
            $table->unsignedBigInteger('tutor_user_id');
            $table->foreign('tutor_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('school');
            $table->enum('degree', ['Associate degree', 'Bachelor degree', 'Master degree', 'Doctoral degree']);
            $table->string('major');            
            $table->text('description');
            $table->string('tutor_img');
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
        Schema::dropIfExists('tutors');
    }
};
