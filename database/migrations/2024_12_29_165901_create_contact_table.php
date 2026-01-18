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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->date('deleted_at')->nullable();
            $table->string('telephone');
            $table->text('adressAr');
            $table->text('adressFR');
            $table->string('boitePostaleFR');
            $table->string('boitePostaleAR');
            $table->string('longe');
            $table->string('alt');
            $table->string('email');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('isPublished');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
