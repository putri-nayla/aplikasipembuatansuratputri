<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalDiterimaToPenerimasTable extends Migration
{
    public function up()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            $table->date('tanggal_diterima')->nullable();
            // Buat nullable kalau mau aman dulu, nanti bisa diubah
        });
    }

    public function down()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            $table->dropColumn('tanggal_diterima');
        });
    }
}
