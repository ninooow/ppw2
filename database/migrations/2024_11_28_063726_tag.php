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
        Schema::create('tags', function (Blueprint $table) {
            $table->id(); // ID unik
            $table->string('name_tag')->unique(); // Nama tag (unik)
            $table->timestamps(); // Tanggal dibuat dan diperbarui
        });


        Schema::create('review_tag', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('review_id')
                ->references('id')
                ->on('reviews')
                ->onDelete('cascade'); 
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_tag');
        Schema::dropIfExists('tags');
    }
};
