<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJudulToPenerimasTable extends Migration
{
    public function up()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            $table->string('judul')->after('nama')->nullable();
            // after('nama') agar kolom judul ada setelah kolom nama (opsional)
            // nullable() supaya tidak wajib langsung diisi
        });
    }

    public function down()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            $table->dropColumn('judul');
        });
    }
}
