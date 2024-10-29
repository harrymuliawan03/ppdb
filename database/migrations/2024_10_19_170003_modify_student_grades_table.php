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
        Schema::table('student_grades', function (Blueprint $table) {
            // 'semester' can only be 1 or 2
            $table->enum('semester', ['1', '2'])->after('nilai');

            // 'school_year' can be a string or a char (e.g., '2023/2024')
            $table->string('school_year', 9)->after('semester'); // Adjust length to fit your year format
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_grades', function (Blueprint $table) {
            $table->dropColumn(['semester', 'school_year']);
        });
    }
};
