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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_type_id')->nullable()->references('id')->on('school_types')->onDelete('cascade');
            $table->dateTime('published_at')->nullable(); 
            $table->enum('media_type', ['image', 'video'])->default('image'); 
            $table->longText('media_path')->nullable();
            $table->string('youtube_url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
