<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('details_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth');
            $table->string('photo');
            $table->tinyInteger('is_membership');
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
        });

        
    }

    public function down(): void
    {
        Schema::dropIfExists('details_users');
    }
};
