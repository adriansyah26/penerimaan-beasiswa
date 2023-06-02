<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKriteria extends Model
{
    use SoftDeletes;

    protected $table = 'sub_kriteria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kriteria_id',
        'sub_kriteria',
        'created_at',
    ];

    /**
     * Get the kriteria associated with the SubKriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'id', 'kriteria_id');
    }
}
