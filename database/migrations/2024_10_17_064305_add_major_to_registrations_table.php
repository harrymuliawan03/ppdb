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
            // Check if the 'major_id' column does not already exist before adding it
            if (!Schema::hasColumn('registrations', 'major_id')) {
                $table->unsignedBigInteger('major_id')->after('no_registration')->nullable();
                $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            // Drop the foreign key and column 'major_id' if it exists
            if (Schema::hasColumn('registrations', 'major_id')) {
                $table->dropForeign(['major_id']);
                $table->dropColumn('major_id');
            }
        });
    }
};
