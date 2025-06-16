<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJudulAndTanggalDiterimaToPenerimasTable extends Migration
{
    public function up()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            if (!Schema::hasColumn('penerimas', 'judul')) {
                $table->string('judul')->nullable();
            }
            if (!Schema::hasColumn('penerimas', 'tanggal_diterima')) {
                $table->date('tanggal_diterima')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            if (Schema::hasColumn('penerimas', 'judul')) {
                $table->dropColumn('judul');
            }
            if (Schema::hasColumn('penerimas', 'tanggal_diterima')) {
                $table->dropColumn('tanggal_diterima');
            }
        });
    }
}
