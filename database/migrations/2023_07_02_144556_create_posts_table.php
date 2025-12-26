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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_type_id')->nullable()->references('id')->on('school_types')->onDelete('cascade');
            $table->foreignId('post_category_id')->nullable()->references('id')->on('post_categories')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->longText('short_description')->nullable();
            $table->longText('content');
            $table->datetime('published_at')->nullable();
            $table->longText('media_galleries')->nullable();
            $table->longText('media_gallery_original_filenames')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
