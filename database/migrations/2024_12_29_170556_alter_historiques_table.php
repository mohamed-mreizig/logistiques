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
        Schema::table('historiques', function (Blueprint $table) {
            // Make logoUrl nullable
            $table->string('logoUrl')->nullable()->change();
            
            // Add new columns if needed
            // $table->string('new_column')->nullable();
            
            // Modify existing columns if needed
            // $table->text('histoAr')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historiques', function (Blueprint $table) {
            // Reverse the changes
            $table->string('logoUrl')->nullable(false)->change();
            
            // Remove added columns if needed
            // $table->dropColumn('new_column');
        });
    }
};