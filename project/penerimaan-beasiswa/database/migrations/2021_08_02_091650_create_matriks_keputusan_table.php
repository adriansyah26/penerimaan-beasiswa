<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriksKeputusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriks_keputusan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mahasiswa_id')->unsigned()->nullable()->default(12);
            $table->integer('ipk')->unsigned()->default(12);
            $table->integer('pendapatan')->unsigned()->default(12);
            $table->integer('prestasi')->unsigned()->default(12);
            $table->tinyInteger('is_select')->unsigbed()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriks_keputusan');
    }
}
