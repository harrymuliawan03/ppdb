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
        Schema::create('prospective_students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // First name
            $table->date('birth_date'); // Date of birth
            $table->enum('gender', ['Male', 'Female', 'Other']); // Enum for gender
            $table->text('address'); // Address
            $table->string('phone_number', 15); // Phone number
            $table->string('email', 100)->unique();
            $table->string('nisn', 100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospective_students');
    }
};
