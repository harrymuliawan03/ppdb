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
        Schema::create('spp_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Foreign key for students
            $table->decimal('amount', 10, 2); // Total payment amount
            $table->string('status')->default('pending'); // Payment status: pending, paid, or overdue
            $table->date('due_date'); // Due date for payment
            $table->date('payment_date')->nullable(); // Payment date if paid
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
        Schema::dropIfExists('spp_payments');
    }
};
