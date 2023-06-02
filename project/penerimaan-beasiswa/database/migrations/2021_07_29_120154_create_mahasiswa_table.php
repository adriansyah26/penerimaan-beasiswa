<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nim');
            $table->integer('prodi');
            $table->string('semester');
            $table->integer('jumlah_tanggungan');
            $table->integer('penghasilan_orang_tua');
            $table->float('ipk')->nullable()->default(123.45);
            $table->integer('prestasi')->default(0);
            $table->longText('alamat');
            $table->string('no_telepon');
            $table->tinyInteger('is_select')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
