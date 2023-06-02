<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatriksKeputusan extends Model
{
    use SoftDeletes;

    protected $table = 'matriks_keputusan';

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'mahasiswa_id',
        'ipk',
        'pendapatan',
        'prestasi'
    ];

    /**
     * Get all of the mahasiswa for the MatrixKeputusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id', 'mahasiswa_id');
    }
}
