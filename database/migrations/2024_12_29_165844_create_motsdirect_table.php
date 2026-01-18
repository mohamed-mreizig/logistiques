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
        Schema::create('motsdirect', function (Blueprint $table) {
            $table->id();

            //expl:3 date
            $table->timestamps();
            $table->date('deleted_at')->nullable();;
            //mots directeur
            $table->string('NameWAr');
            $table->string('NameWFr');
            
            $table->text('descriptionWAr'); 
            $table->text('descriptionWFr'); 
            $table->boolean('isPublished');
            $table->string('imgUrl');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motsdirect');
    }
};
