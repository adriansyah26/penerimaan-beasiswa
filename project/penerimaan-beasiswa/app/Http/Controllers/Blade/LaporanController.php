<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\MatriksTerbobot;
use App\Models\NormalisasiMatriksKeputusan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('laporan.view');

        // $maxIPK        = NormalisasiMatriksKeputusan::max('ipk');
        // $maxPendapatan = NormalisasiMatriksKeputusan::max('pendapatan');
        // $maxPrestasi   = NormalisasiMatriksKeputusan::max('prestasi');

        // $minIPK        = NormalisasiMatriksKeputusan::min('ipk');
        // $minPendapatan = NormalisasiMatriksKeputusan::min('pendapatan');
        // $minPrestasi   = NormalisasiMatriksKeputusan::min('prestasi');

        $maxIPK        = MatriksTerbobot::max('ipk');
        $maxPendapatan = MatriksTerbobot::max('pendapatan');
        $maxPrestasi   = MatriksTerbobot::max('prestasi');

        $minIPK        = MatriksTerbobot::min('ipk');
        $minPendapatan = MatriksTerbobot::min('pendapatan');
        $minPrestasi   = MatriksTerbobot::min('prestasi');

        $matriks = MatriksTerbobot::select(
            'mahasiswa_id',
        //     DB::raw(
        //         'sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2)) /
        //         (sqrt(pow(('. $maxIPK .' - ipk), 2) + pow(('.$maxPendapatan.' - pendapatan), 2) + pow(('.$maxPrestasi.' - prestasi), 2)) +
        //         sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2))) as preferensi'
        //     )
        // )->orderBy('preferensi', 'desc')->get();

        DB::raw('FORMAT(
            sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2)) /
            (
                sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2)) +
                sqrt(pow(('. $maxIPK .' - ipk), 2) + pow(('.$maxPendapatan.' - pendapatan), 2) + pow(('.$maxPrestasi.' - prestasi), 2))
            ), 9
        ) as preferensi')
    // )->get();
    )->orderBy('preferensi', 'desc')->get();

        return view('pages.laporan.index', \compact('matriks'));
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

    public function print()
    {
        // $maxIPK        = NormalisasiMatriksKeputusan::max('ipk');
        // $maxPendapatan = NormalisasiMatriksKeputusan::max('pendapatan');
        // $maxPrestasi   = NormalisasiMatriksKeputusan::max('prestasi');

        // $minIPK        = NormalisasiMatriksKeputusan::min('ipk');
        // $minPendapatan = NormalisasiMatriksKeputusan::min('pendapatan');
        // $minPrestasi   = NormalisasiMatriksKeputusan::min('prestasi');

        $maxIPK        = MatriksTerbobot::max('ipk');
        $maxPendapatan = MatriksTerbobot::max('pendapatan');
        $maxPrestasi   = MatriksTerbobot::max('prestasi');

        $minIPK        = MatriksTerbobot::min('ipk');
        $minPendapatan = MatriksTerbobot::min('pendapatan');
        $minPrestasi   = MatriksTerbobot::min('prestasi');

        $matriks = MatriksTerbobot::select(
            'mahasiswa_id',
            // DB::raw(
            //     'sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2)) /
            //     (sqrt(pow(('. $maxIPK .' - ipk), 2) + pow(('.$maxPendapatan.' - pendapatan), 2) + pow(('.$maxPrestasi.' - prestasi), 2)) +
            //     sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2))) as preferensi'
            // )

            DB::raw('FORMAT(
                sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2)) /
                (
                    sqrt(pow(('. $minIPK .' - ipk), 2) + pow(('.$minPendapatan.' - pendapatan), 2) + pow(('.$minPrestasi.' - prestasi), 2)) +
                    sqrt(pow(('. $maxIPK .' - ipk), 2) + pow(('.$maxPendapatan.' - pendapatan), 2) + pow(('.$maxPrestasi.' - prestasi), 2))
                ), 9
            ) as preferensi')
        )->orderBy('preferensi', 'desc')->get();

        $pdf = PDF::loadview('pages.laporan.print', compact('matriks',));
        $pdf->setPaper('a4','landscape');
        return $pdf->stream();
    }
}
