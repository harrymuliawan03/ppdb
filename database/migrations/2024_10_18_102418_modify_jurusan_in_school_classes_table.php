<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('school_classes', function (Blueprint $table) {
            // Drop the existing wali_kelas string column
            $table->dropColumn('jurusan');
            
            // Add the new wali_kelas as a foreign key referencing the 'teachers' table
            $table->unsignedBigInteger('jurusan_id')->after('nama_kelas');
            $table->foreign('jurusan_id')->references('id')->on('majors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_classes', function (Blueprint $table) {
            // Drop the foreign key constraint and the jurusan_id column
            $table->dropForeign(['jurusan_id']);
            $table->dropColumn('jurusan_id');
            
            // Add back the wali_kelas string column
            $table->string('jurusan')->after('nama_kelas');
        });
    }
};
