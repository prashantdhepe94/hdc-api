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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_type_id')->references('id')->on('school_types')->onDelete('cascade');
            $table->foreignId('staff_type_id')->references('id')->on('staff_types')->onDelete('cascade');
            $table->string('name');
            $table->string('mobile_no')->nullable();
            $table->text('address')->nullable();
            $table->text('qualification');
            $table->text('teaching_as')->nullable();
            $table->date('date_of_joining');
            $table->boolean('is_salaried');
            $table->text('photo')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
