<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Add the new wali_kelas as a foreign key referencing the 'teachers' table
            $table->unsignedBigInteger('school_class_id')->after('name')->nullable();
            $table->foreign('school_class_id')->references('id')->on('school_classes')->onDelete('cascade');
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
            // Drop the foreign key constraint and the school_class_id column
            $table->dropForeign(['school_class_id']);
            $table->dropColumn('school_class_id');
        });
    }
};
