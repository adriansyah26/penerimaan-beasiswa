<?php

use App\Models\SubKriteria;
use Illuminate\Database\Seeder;

class SubKriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubKriteria::insert([
            [
                'kriteria_id'  => 1,
                'sub_kriteria' => 'Rendah',
                'created_at'   => now()
            ],
            [
                'kriteria_id'  => 1,
                'sub_kriteria' => 'Cukup',
                'created_at'   => now()
            ],
            [
                'kriteria_id'  => 1,
                'sub_kriteria' => 'Tinggi',
                'created_at'   => now()
            ],
            [
                'kriteria_id'  => 2,
                'sub_kriteria' => 'Rendah',
                'created_at'   => now()
            ],
            [
                'kriteria_id'  => 2,
                'sub_kriteria' => 'Cukup',
                'created_at'   => now()
            ],
            [
                'kriteria_id'  => 2,
                'sub_kriteria' => 'Tinggi',
                'created_at'   => now()
            ],
            [
                'kriteria_id'  => 3,
                'sub_kriteria' => 'Rendah',
                'created_at'   => now()
            ],
            [
                'kriteria_id'  => 3,
                'sub_kriteria' => 'Cukup',
                'created_at'   => now()
            ],
            [
                'kriteria_id'  => 3,
                'sub_kriteria' => 'Tinggi',
                'created_at'   => now()
            ],

        ]);
    }
}
