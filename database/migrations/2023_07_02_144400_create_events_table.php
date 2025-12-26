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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_type_id')->references('id')->on('school_types')->onDelete('cascade');
            $table->string('title');
            $table->longText('short_description');
            $table->longText('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_published');
            $table->dateTime('published_at');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
