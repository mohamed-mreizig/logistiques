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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            //expl:3 date
            $table->timestamps();
            $table->date('deleted_at')->nullable();;
            //ar fr 
            $table->string('titleAr');
            $table->string('titleFr');
            
            $table->text('descriptionAr'); 
            $table->text('descriptionFr'); 

            $table->foreignId('servicetype_id')->constrained('servicetypes')->onDelete('cascade');
            $table->string('imgUrl');
            $table->boolean('isPublished');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
