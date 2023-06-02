<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerbandinganBerpasangan extends Model
{
    use SoftDeletes;

    protected $table = 'perbandingan_berpasangan';

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'kriteria_id',
        'ipk',
        'pendapatan',
        'prestasi'
    ];

    /**
     * Get the kriteria associated with the PerbandinganBerpasangan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'id', 'kriteria_id');
    }
}
