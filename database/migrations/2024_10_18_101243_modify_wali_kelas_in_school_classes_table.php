<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyWaliKelasInSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            // Drop the existing wali_kelas string column
            $table->dropColumn('wali_kelas');
            
            // Add the new wali_kelas as a foreign key referencing the 'teachers' table
            $table->unsignedBigInteger('wali_kelas_id')->after('jurusan');
            $table->foreign('wali_kelas_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            // Drop the foreign key constraint and the wali_kelas_id column
            $table->dropForeign(['wali_kelas_id']);
            $table->dropColumn('wali_kelas_id');
            
            // Add back the wali_kelas string column
            $table->string('wali_kelas', 100)->after('jurusan');
        });
    }
}
