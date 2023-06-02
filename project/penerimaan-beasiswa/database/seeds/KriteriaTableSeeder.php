<?php

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kriteria::insert([
            [
                'nama_kriteria' => 'IPK',
                'is_select'     => 0,
                'created_at'    => now(),
            ],
            [
                'nama_kriteria' => 'PENDAPATAN ORANG TUA',
                'is_select'     => 0,
                'created_at'    => now(),
            ],
            [
                'nama_kriteria' => 'PRESTASI',
                'is_select'     => 0,
                'created_at'    => now(),
            ],
        ]);
    }
}
