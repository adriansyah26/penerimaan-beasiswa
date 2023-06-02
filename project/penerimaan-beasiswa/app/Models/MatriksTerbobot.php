<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class MatriksTerbobot extends Model
{
    use SoftDeletes;

    protected $table = 'matriks_terbobot';

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

    public function getRank()
    {
        $maxIPK        = MatriksTerbobot::max('ipk');
        $maxPendapatan = MatriksTerbobot::max('pendapatan');
        $maxPrestasi   = MatriksTerbobot::max('prestasi');

        $minIPK        = MatriksTerbobot::min('ipk');
        $minPendapatan = MatriksTerbobot::min('pendapatan');
        $minPrestasi   = MatriksTerbobot::min('prestasi');

        $collection = collect(MatriksTerbobot::query()
        ->selectRaw('
            FORMAT(
                sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2)) /
                (
                    sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2)) +
                    sqrt(pow(('. $maxIPK .' - ipk), 2) + pow(('.$maxPendapatan.' - pendapatan), 2) + pow(('.$maxPrestasi.' - prestasi), 2))
                ), 9
            ) as preferensi
        ')
        ->groupBy('preferensi')
        ->orderByDesc('preferensi')
        ->get());
        $data  = $collection->where('preferensi', $this->preferensi);
        $value = $data->keys()->first() + 1;

        return $value;
    }
}
