<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePegawaiAddJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_pegawai', function (Blueprint $table) {
            $table->integer('jabatan_id')->unsigned()->nullable();
            $table->foreign('jabatan_id')->references('id')->on('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ref_pegawai', function (Blueprint $table) {
            //
            $table->dropForeign(['jabatan_id']);
            $table->dropColumn('jabatan_id');
        });
    }
}
