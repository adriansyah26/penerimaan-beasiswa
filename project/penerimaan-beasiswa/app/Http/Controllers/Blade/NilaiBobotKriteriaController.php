<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\MatriksNormalisasi;
use Illuminate\Http\Request;

class NilaiBobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('normalisasi-matriks-terbobot.view');

        $normalisasi = MatriksNormalisasi::orderBy('kriteria_id')->get();

        $jumlahIPK        = MatriksNormalisasi::sum('ipk');
        $jumlahPendapatan = MatriksNormalisasi::sum('pendapatan');
        $jumlahPrestasi   = MatriksNormalisasi::sum('prestasi');
        $jumlah           = MatriksNormalisasi::sum('jumlah');
        $bobot            = MatriksNormalisasi::sum('bobot');

        return view('pages.nilai-terbobot-kriteria.index', \compact(
            'normalisasi',
            'jumlahIPK',
            'jumlahPendapatan',
            'jumlahPrestasi',
            'jumlah',
            'bobot'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
