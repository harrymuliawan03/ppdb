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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary key, auto-increment
            $table->string('first_name', 100); // First name
            $table->string('last_name', 100); // Last name
            $table->date('birth_date'); // Date of birth
            $table->enum('gender', ['Male', 'Female', 'Other']); // Enum for gender
            $table->text('address'); // Address
            $table->string('phone_number', 15); // Phone number
            $table->string('email', 100)->unique();
            $table->string('nisn', 100)->unique();
            // $table->string('previous_school', 255)->nullable();
            // $table->enum('grade_applied', ['1', '2', '3', '4', '5', '6']);
            // $table->enum('admission_status', ['Pending', 'Accepted', 'Rejected'])->default('Pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
