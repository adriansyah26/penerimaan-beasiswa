<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbandinganBerpasanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_berpasangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kriteria_id')->unsigned()->default(12);
            $table->double('ipk', 15, 8)->default(123.4567);
            $table->double('pendapatan', 15, 8)->default(123.4567);
            $table->double('prestasi', 15, 8)->default(123.4567);
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
        Schema::dropIfExists('perbandingan_berpasangan');
    }
}
