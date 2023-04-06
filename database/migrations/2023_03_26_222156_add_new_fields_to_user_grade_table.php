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
        Schema::table('user_grade', function (Blueprint $table) {
            $table->integer('difficulty')->unsigned()->after('grade');
            $table->boolean('take_again')->after('difficulty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_grade', function (Blueprint $table) {
            $table->dropColumn('difficulty');
            $table->dropColumn('take_again');
        });
    }
};
