<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembobotanKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembobotan_kriteria', function (Blueprint $table) {
            $table->id('id_pembobotan_kriteria');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_kriteria');
            $table->float('nilai');
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembobotan_kriteria');
    }
}
