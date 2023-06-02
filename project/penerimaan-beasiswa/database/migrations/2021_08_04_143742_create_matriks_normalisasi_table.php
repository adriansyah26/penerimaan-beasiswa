<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriksNormalisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriks_normalisasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kriteria_id')->unsigned()->default(12);
            $table->double('ipk', 15, 11)->default(0123.4567890);
            $table->double('pendapatan', 15, 11)->default(0123.4567890);
            $table->double('prestasi', 15, 11)->default(0123.4567890);
            $table->double('jumlah', 15, 11)->default(0123.4567890);
            $table->double('bobot', 15, 11)->default(0123.4567890);
            $table->tinyInteger('is_select')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kriteria_id')->references('id')->on('kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriks_normalisasi');
    }
}
