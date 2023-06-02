<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\MatriksNormalisasi;
use App\Models\PerbandinganBerpasangan;
use Illuminate\Http\Request;

class MatriksNormalisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('perbandingan-berpasangan.view');

        $normalisasi = MatriksNormalisasi::orderBy('kriteria_id')->get();

        $jumlahIPK        = MatriksNormalisasi::sum('ipk');
        $jumlahPendapatan = MatriksNormalisasi::sum('pendapatan');
        $jumlahPrestasi   = MatriksNormalisasi::sum('prestasi');

        return view('pages.matriks-normalisasi.index', \compact(
            'normalisasi',
            'jumlahIPK',
            'jumlahPendapatan',
            'jumlahPrestasi'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \abort_if_forbidden('perbandingan-berpasangan.add');

        $kriteria = PerbandinganBerpasangan::select(
            'perbandingan_berpasangan.kriteria_id as id',
            'kriteria.nama_kriteria as nama_kriteria'
        )
        ->leftJoin(
            'kriteria', 'kriteria.id', 'perbandingan_berpasangan.kriteria_id'
        )
        ->where('perbandingan_berpasangan.is_select', 0)
        ->orderBy('perbandingan_berpasangan.kriteria_id', 'asc')
        ->get()->pluck('nama_kriteria', 'id');

        return \view('pages.matriks-normalisasi.add', \compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \abort_if_forbidden('perbandingan-berpasangan.add');

        $this->validate($request,[
            'kriteria' => ['required']
        ]);

        $kriteria  = Kriteria::where('id', $request->kriteria)->first();

        $perbandingan = PerbandinganBerpasangan::select(
            'perbandingan_berpasangan.*',
            'kriteria.nama_kriteria as nama_kriteria'
        )
        ->leftJoin(
            'kriteria', 'kriteria.id', 'perbandingan_berpasangan.kriteria_id'
        )
        ->where('perbandingan_berpasangan.kriteria_id', $kriteria->id)
        ->first();

        $jumlahIPK = PerbandinganBerpasangan::leftJoin('kriteria', 'kriteria.id', 'perbandingan_berpasangan.kriteria_id')
        ->sum('perbandingan_berpasangan.ipk');
        $jumlahPendapatan = PerbandinganBerpasangan::leftJoin('kriteria', 'kriteria.id', 'perbandingan_berpasangan.kriteria_id')
        ->sum('perbandingan_berpasangan.pendapatan');
        $jumlahPrestasi = PerbandinganBerpasangan::leftJoin('kriteria', 'kriteria.id', 'perbandingan_berpasangan.kriteria_id')
        ->sum('perbandingan_berpasangan.prestasi');

        $normalisasi              = new MatriksNormalisasi;
        $normalisasi->kriteria_id = $kriteria->id;
        $normalisasi->ipk         = $perbandingan->ipk / $jumlahIPK;
        $normalisasi->pendapatan  = $perbandingan->pendapatan / $jumlahPendapatan;
        $normalisasi->prestasi    = $perbandingan->prestasi / $jumlahPrestasi;
        $normalisasi->jumlah      = \doubleval(\number_format($normalisasi->ipk + $normalisasi->pendapatan + $normalisasi->prestasi, 10));
        $normalisasi->bobot       = \doubleval(\number_format($normalisasi->jumlah / 3, 3));
        $normalisasi->created_at  = now();
        $normalisasi->save();

        $perbandingan->update([$perbandingan->is_select = 1]);

        message_set('Matriks Normalisasi is Created!','success',2);
        return redirect()->route('matriks-normalisasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
