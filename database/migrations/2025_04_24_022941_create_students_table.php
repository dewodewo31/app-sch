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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('birth_place'); // Tempat lahir
            $table->string('address');
            $table->string('religion');
            $table->string('phone')->nullable(); // Nomor HP (opsional)
            $table->string('photo')->nullable(); // Path ke foto profil

            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Akun login siswa
            $table->foreignId('classroom_id')->constrained()->cascadeOnDelete(); // Kelas siswa

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
