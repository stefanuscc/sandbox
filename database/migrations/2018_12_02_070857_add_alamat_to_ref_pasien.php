<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlamatToRefPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_pasien', function (Blueprint $table) {
            $table->text('alamat_utama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ref_pasien', function (Blueprint $table) {
            $table->dropColumn('alamat_utama');
        });
    }
}
