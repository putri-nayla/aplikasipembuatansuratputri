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
        Schema::table('surat', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat', function (Blueprint $table) {
          
{
    Schema::table('surat', function (Blueprint $table) {
        $table->string('file')->nullable();
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->string('tujuan')->nullable();
            $table->string('file');
            $table->text('keterangan')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
        });
        
    });
}

        });
    }
};
