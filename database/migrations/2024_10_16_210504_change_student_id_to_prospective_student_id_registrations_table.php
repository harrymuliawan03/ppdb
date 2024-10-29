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
        Schema::table('registrations', function (Blueprint $table) {
            // Rename the column
            // $table->renameColumn('student_id', 'prospective_student_id');

            // Drop the foreign key constraint if it exists
            // $table->dropFor  eign(['prospective_student_id']);
            
            // Add the new foreign key constraint referencing the prospective_students table
            $table->foreign('prospective_student_id')->references('id')->on('prospective_students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['prospective_student_id']);

            // Rename the column back to student_id
            $table->renameColumn('prospective_student_id', 'student_id');

            // Add the original foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }
};
