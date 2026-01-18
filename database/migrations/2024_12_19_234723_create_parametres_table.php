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
        Schema::create('parametres', function (Blueprint $table) {
            $table->id();

            //expl:3 date
            $table->timestamps();
            $table->date('deleted_at');
            //ar fr 
            







            //historique
            $table->text('histoAr'); 
            $table->text('histoFR'); 

//logo
            $table->string('logoUrl');


            $table->boolean('isPublished');

//for all
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametres');
    }
};
