<?php

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::insert([
            [
                'nama'                  => 'Rizki Sukma Ababiel',
                'nim'                   => '16411013',
                'prodi'                 => 2,
                'semester'              => 6,
                'jumlah_tanggungan'     => 2,
                'penghasilan_orang_tua' => 2700000,
                'ipk'                   => 3.95,
                'prestasi'              => 0,
                'alamat'                => 'Jalan Tenaga Lirstrik RT13/16 No.2',
                'no_telepon'            => '083870406476',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Siti Debi Nuraeni',
                'nim'                   => '17411039',
                'prodi'                 => 2,
                'semester'              => 4,
                'jumlah_tanggungan'     => 5,
                'penghasilan_orang_tua' => 4000000,
                'ipk'                   => 3.6,
                'prestasi'              => 0,
                'alamat'                => 'Kp. Tapos RT04/02 Pondokkaso tengah, Cihadu Sukabumi',
                'no_telepon'            => '081210839345',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Sandi Eko Saputro',
                'nim'                   => '17411031',
                'prodi'                 => 2,
                'semester'              => 4,
                'jumlah_tanggungan'     => 2,
                'penghasilan_orang_tua' => 2000000,
                'ipk'                   => 3.65,
                'prestasi'              => 0,
                'alamat'                => 'Jl. Haji Taisir Gang Swadaya RT009/011 Palmerah Jakarta Barat',
                'no_telepon'            => '085385170059',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Astri Mahgdalimah',
                'nim'                   => '17411041',
                'prodi'                 => 2,
                'semester'              => 4,
                'jumlah_tanggungan'     => 1,
                'penghasilan_orang_tua' => 2000000,
                'ipk'                   => 3.24,
                'prestasi'              => 0,
                'alamat'                => 'Jl. Kemanggisan Ilir II RT7/7',
                'no_telepon'            => '083840998488',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Roslin Huberta Lau',
                'nim'                   => '17411044',
                'prodi'                 => 2,
                'semester'              => 4,
                'jumlah_tanggungan'     => 7,
                'penghasilan_orang_tua' => 2000000,
                'ipk'                   => 3.3,
                'prestasi'              => 0,
                'alamat'                => 'Jl. Jaani Nasir RT001/10 Cawang jakarta timur',
                'no_telepon'            => '081317019675',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Chindy Chintya',
                'nim'                   => '17411045',
                'prodi'                 => 2,
                'semester'              => 4,
                'jumlah_tanggungan'     => 2,
                'penghasilan_orang_tua' => 2000000,
                'ipk'                   => 3.25,
                'prestasi'              => 0,
                'alamat'                => 'Jl. Kemanggisan Ilir III No.9A',
                'no_telepon'            => '083876946924',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Diah Ayu Puspita',
                'nim'                   => '17411049',
                'prodi'                 => 2,
                'semester'              => 4,
                'jumlah_tanggungan'     => 5,
                'penghasilan_orang_tua' => 800000,
                'ipk'                   => 3.9,
                'prestasi'              => 0,
                'alamat'                => 'JL. Kemanggisan Grorol RT011/008',
                'no_telepon'            => '081288586085',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Parlindungan Duha',
                'nim'                   => '16412007',
                'prodi'                 => 1,
                'semester'              => 6,
                'jumlah_tanggungan'     => 3,
                'penghasilan_orang_tua' => 2000000,
                'ipk'                   => 3.37,
                'prestasi'              => 0,
                'alamat'                => 'Sontang RT14/005',
                'no_telepon'            => '085312364895',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Naufal Nafis',
                'nim'                   => '16412028',
                'prodi'                 => 1,
                'semester'              => 6,
                'jumlah_tanggungan'     => 2,
                'penghasilan_orang_tua' => 2000000,
                'ipk'                   => 3.95,
                'prestasi'              => 0,
                'alamat'                => 'Jl. Kemandoran Pluis Kelurahan Grogorl utara',
                'no_telepon'            => '085786869492',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Riski Setiyawan',
                'nim'                   => '17412014',
                'prodi'                 => 1,
                'semester'              => 4,
                'jumlah_tanggungan'     => 1,
                'penghasilan_orang_tua' => 2000000,
                'ipk'                   => 3.18,
                'prestasi'              => 0,
                'alamat'                => 'Pedongkelan Belakang RT/12/13 Kel. Kapuk',
                'no_telepon'            => '085642567665',
                'created_at'            => now()
            ],
            [
                'nama'                  => 'Nathanael Fernanda F',
                'nim'                   => '17412042',
                'prodi'                 => 1,
                'semester'              => 4,
                'jumlah_tanggungan'     => 2,
                'penghasilan_orang_tua' => 3000000,
                'ipk'                   => 3.77,
                'prestasi'              => 0,
                'alamat'                => 'Jln. Kalingga VI No.28 Kadipiro, Banjarsari, Surakarta Jawa Tengah',
                'no_telepon'            => '087735057945',
                'created_at'            => now()
            ],
        ]);
    }
}
