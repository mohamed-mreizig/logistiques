<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add the `footer` column to the `doctypes` table
        Schema::table('doctypes', function (Blueprint $table) {
            $table->boolean('footer')->default(false);
        });

        // Update all existing records to set `footer` to false
        \DB::table('doctypes')->update(['footer' => false]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the `footer` column from the `doctypes` table
        Schema::table('doctypes', function (Blueprint $table) {
            $table->dropColumn('footer');
        });
    }
};