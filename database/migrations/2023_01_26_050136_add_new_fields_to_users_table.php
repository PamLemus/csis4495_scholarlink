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
        Schema::table('users', function (Blueprint $table) {

            $table->string('last_name')->after('name');
            $table->date('date_of_birth')->after('last_name');
            $table->string('occupation')->after('date_of_birth');
            $table->string('user_type')->after('password');
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('occupation');
            $table->dropColumn('user_type');
            
        });
    }
};
