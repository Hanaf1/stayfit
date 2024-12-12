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
        Schema::create('detail_doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('gelar');
            $table->text('alamat_praktek');
            $table->string('email');
            $table->string('spesialisasi');
            $table->text('pengalaman_kerja');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('doctor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_doctors');
    }
};
