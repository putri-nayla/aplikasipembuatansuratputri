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
       
    

        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('namaakategori');
            $table->string('created_at'); 
            $table->string('updated_at');
  $table->enum('status', ['pending', 'setujui', 'tolak'])->default('pending');
          
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('kategori');
    }
};

