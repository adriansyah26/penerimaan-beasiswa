<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\PerbandinganBerpasangan;
use Illuminate\Http\Request;

class PerbandinganBerpasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('perbandingan-berpasangan.view');

        $kriteria     = Kriteria::all();
        $perbandingan = PerbandinganBerpasangan::all();

        $jumlahIPK = PerbandinganBerpasangan::leftJoin('kriteria', 'kriteria.id', 'perbandingan_berpasangan.kriteria_id')
        ->sum('perbandingan_berpasangan.ipk');
        $jumlahPendapatan = PerbandinganBerpasangan::leftJoin('kriteria', 'kriteria.id', 'perbandingan_berpasangan.kriteria_id')
        ->sum('perbandingan_berpasangan.pendapatan');
        $jumlahPrestasi = PerbandinganBerpasangan::leftJoin('kriteria', 'kriteria.id', 'perbandingan_berpasangan.kriteria_id')
        ->sum('perbandingan_berpasangan.prestasi');

        return \view('pages.perbandingan-berpasangan.index', \compact(
            'perbandingan',
            'kriteria',
            'perbandingan',
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

        $kriteria  = Kriteria::all()->where('is_select', 0)->pluck('nama_kriteria', 'id');
        $kriteria2 = Kriteria::all()->pluck('nama_kriteria', 'id');

        return \view('pages.perbandingan-berpasangan.add', \compact(
            'kriteria',
            'kriteria2'
        ));
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
            'kriteria'     => ['required'],
            'kriteria2' => ['required']
        ]);

        $kriteria  = Kriteria::where('id', $request->kriteria)->first();
        $kriteria2 = Kriteria::where('id', $request->kriteria2)->first();

        $skalaIPK        = 0;
        $skalaPendapatan = 0;
        $skalaPrestasi   = 0;

        if ($kriteria->id === 1 && $kriteria2->id === 1) {
            $skalaIPK        = 1;
            $skalaPendapatan = 3;
            $skalaPrestasi   = 5;
        } else if ($kriteria->id === 1 && $kriteria2->id === 2) {
            $skalaIPK        = 1;
            $skalaPendapatan = 3;
            $skalaPrestasi   = 5;
        } else if ($kriteria->id === 1 && $kriteria2->id === 3) {
            $skalaIPK        = 1;
            $skalaPendapatan = 3;
            $skalaPrestasi   = 5;
        }

        if ($kriteria->id === 2 && $kriteria2->id === 1) {
            $skalaIPK        = 1 / 3;
            $skalaPendapatan = 1;
            $skalaPrestasi   = 3;
        } else if ($kriteria->id === 2 && $kriteria2->id === 2) {
            $skalaIPK        = 1 / 3;
            $skalaPendapatan = 1;
            $skalaPrestasi   = 3;
        } else if ($kriteria->id === 2 && $kriteria2->id === 3) {
            $skalaIPK        = 1 / 3;
            $skalaPendapatan = 1;
            $skalaPrestasi   = 3;
        }

        if ($kriteria->id === 3 && $kriteria2->id === 1) {
            $skalaIPK        = 1 / 5;
            $skalaPendapatan = 1 / 3;
            $skalaPrestasi   = 1;
        } else if ($kriteria->id === 3 && $kriteria2->id === 2) {
            $skalaIPK        = 1 / 5;
            $skalaPendapatan = 1 / 3;
            $skalaPrestasi   = 1;
        } else if ($kriteria->id === 3 && $kriteria2->id === 3) {
            $skalaIPK        = 1 / 5;
            $skalaPendapatan = 1 / 3;
            $skalaPrestasi   = 1;
        }

        $perbandingan              = new PerbandinganBerpasangan;
        $perbandingan->kriteria_id = $kriteria->id;
        $perbandingan->ipk         = $skalaIPK;
        $perbandingan->pendapatan  = $skalaPendapatan;
        $perbandingan->prestasi    = $skalaPrestasi;
        $perbandingan->save();

        $kriteria->update([$kriteria->is_select = 1]);

        message_set('Perbandingan Berpasangan is Created!','success',2);
        return redirect()->route('perbandingan-berpasangan.index');
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
