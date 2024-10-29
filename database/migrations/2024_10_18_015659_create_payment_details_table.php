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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spp_payment_id'); // Foreign key for spp_payments
            $table->string('description'); // Description of the payment item (e.g., tuition fee, late fee)
            $table->decimal('amount', 10, 2); // Amount for this particular payment item
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('spp_payment_id')->references('id')->on('spp_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
