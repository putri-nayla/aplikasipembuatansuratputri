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
       
    

        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('namaadmin');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('status', ['pending', 'setujui', 'tolak'])->default('pending');
            $table->enum('role', ['admin', 'petugas'])->default('petugas');
            $table->string('foto')->nullable();
            $table->timestamp('setujui')->nullable();
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('admin');
    }
};

