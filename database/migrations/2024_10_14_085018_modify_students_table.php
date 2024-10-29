<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Remove the first_name and last_name columns
            $table->dropColumn(['first_name', 'last_name']);
            
            // Add the name column
            $table->string('name', 200)->after('id'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Re-add first_name and last_name columns
            $table->string('first_name', 100)->after('id');
            $table->string('last_name', 100)->after('first_name');
            
            // Remove the name column
            $table->dropColumn('name');
        });
    }
}
