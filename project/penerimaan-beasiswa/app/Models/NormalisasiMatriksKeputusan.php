<?php

namespace App\Models;

use App\Admin\MatrixKeputusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NormalisasiMatriksKeputusan extends Model
{
    use SoftDeletes;

    protected $table = 'normalisasi_matriks_keputusan';

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'matriks_keputusan_id',
        'ipk',
        'pendapatan',
        'prestasi'
    ];

    /**
     * Get all of the mahasiswa for the MatrixKeputusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriks_keputusan()
    {
        return $this->hasOne(MatrixKeputusan::class, 'id', 'matriks_keputusan_id');
    }

    /**
     * Get all of the mahasiswa for the MatrixKeputusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'mahasiswa_id');
    }
}
