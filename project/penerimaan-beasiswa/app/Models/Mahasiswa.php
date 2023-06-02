<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $table = 'mahasiswa';
    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'nama',
        'nim',
        'prodi',
        'semester',
        'jumlah_tanggungan',
        'penghasilan_orang_tua',
        'ipk',
        'prestasi',
        'alamat',
        'no_telepon',
    ];
}
