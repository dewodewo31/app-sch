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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('certificate_number')->nullable()->unique();
            $table->date('certification_date')->nullable();
            $table->string('certification_institution')->nullable();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
