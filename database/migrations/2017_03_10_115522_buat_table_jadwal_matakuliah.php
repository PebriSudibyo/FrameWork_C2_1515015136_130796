<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableJadwalMatakuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_matakuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mahasiswa_id')->unsigned();
            $table->integer('ruangan_id')->unsigned();
            $table->integer('dosen_matakuliah_id')->unsigned();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('id')->on('ruangan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dosen_matakuliah_id')->references('id')->on('dosen_matakuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jadwal_matakuliah');
    }
}
