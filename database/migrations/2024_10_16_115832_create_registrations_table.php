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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // foreign key dari tabel students
            $table->string('ijazah')->nullable(); // Path file ijazah
            $table->string('raport')->nullable(); // Path file raport
            $table->string('birth_certificate')->nullable(); // Path file akta kelahiran
            $table->string('student_photo')->nullable(); // Path file foto siswa
            $table->date('registration_date'); // Tanggal pendaftaran
            $table->string('status')->default('pending'); // Status pendaftaran (pending, approved, rejected)
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
