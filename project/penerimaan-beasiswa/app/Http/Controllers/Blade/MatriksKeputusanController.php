<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\MatriksKeputusan;
use App\Models\NormalisasiMatriks;
use App\Models\NormalisasiMatriksKeputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriksKeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('matriks-keputusan.view');

        $matriks_keputusan = MatriksKeputusan::all();
        return view('pages.matriks-keputusan.index', \compact('matriks_keputusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \abort_if_forbidden('matriks-keputusan.add');

        $mahasiswa = Mahasiswa::all()->where('is_select', 0)->pluck('nama', 'id');

        return view('pages.matriks-keputusan.add', \compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \abort_if_forbidden('matriks-keputusan.add');

        $this->validate($request,['mahasiswa' => ['required']]);

        $mahasiswa = Mahasiswa::where('id', $request->mahasiswa)->first();

        $matrikIPK        = 0;
        $matrikPendapatan = 0;
        $matrikPrestasi   = 0;

        if ($mahasiswa->ipk >= 3.0 && $mahasiswa->ipk <= 3.4 || $mahasiswa->ipk <= 3.0) {
            $matrikIPK = 1;
        } else if ($mahasiswa->ipk >= 3.41 && $mahasiswa->ipk <= 3.7) {
            $matrikIPK = 3;
        } else if ($mahasiswa->ipk >= 3.71 && $mahasiswa->ipk <= 4.0 || $mahasiswa->ipk >= 4.0) {
            $matrikIPK = 5;
        } else {
            return redirect()->back();
        }

        if ($mahasiswa->penghasilan_orang_tua >= 1000000 && $mahasiswa->penghasilan_orang_tua <= 1500000 || $mahasiswa->penghasilan_orang_tua <= 1000000) {
            $matrikPendapatan = 5;
        } else if ($mahasiswa->penghasilan_orang_tua >= 1600000 && $mahasiswa->penghasilan_orang_tua <= 4000000) {
            $matrikPendapatan = 3;
        } else if ($mahasiswa->penghasilan_orang_tua >= 4100000 && $mahasiswa->penghasilan_orang_tua <= 7000000 || $mahasiswa->penghasilan_orang_tua >= 7000000) {
            $matrikPendapatan = 1;
        } else {
            return redirect()->back();
        }

        if ($mahasiswa->prestasi >= 0 && $mahasiswa->prestasi <= 1) {
            $matrikPrestasi = 1;
        } else
        if ($mahasiswa->prestasi >= 2 && $mahasiswa->prestasi <= 3) {
            $matrikPrestasi = 3;
        } else
        if ($mahasiswa->prestasi >= 4 && $mahasiswa->prestasi <= 5 || $mahasiswa->prestasi >= 5) {
            $matrikPrestasi = 5;
        } else {
            return redirect()->back();
        }

        $matrik               = new MatriksKeputusan;
        $matrik->mahasiswa_id = $mahasiswa->id;
        $matrik->ipk          = $matrikIPK;
        $matrik->pendapatan   = $matrikPendapatan;
        $matrik->prestasi     = $matrikPrestasi;
        $matrik->created_at   = \now();
        $matrik->save();

        $mahasiswa->update([$mahasiswa->is_select = 1]);

        $matriksKeputusan = MatriksKeputusan::select(
            DB::raw('sqrt(sum(pow(ipk, 2))) as ipk'),
            DB::raw('sqrt(sum(pow(pendapatan, 2))) as pendapatan'),
            DB::raw('sqrt(sum(pow(prestasi, 2))) as prestasi')
        )->get();

        foreach ($matriksKeputusan as $key => $keputusan) {
            $keputusan;
        }

        $getNormalisasi = NormalisasiMatriksKeputusan::all();

        foreach ($getNormalisasi as $key => $normal) {
            $normal;
        }

         if (empty($normal)) {
            return redirect()->route('matriks-keputusan.index');
        }

        $normal->where('mahasiswa_id', $mahasiswa->id)->update([
            $normal->ipk          = \doubleval($normal->ipk / $keputusan->ipk),
            $normal->pendapatan   = \doubleval($normal->pendapatan / $keputusan->pendapatan),
            $normal->prestasi     = \doubleval($normal->prestasi / $keputusan->prestasi),
            $normal->updated_at   = now()
        ]);

        message_set('Perbandingan Berpasangan is Created!','success',2);
        return redirect()->route('matriks-keputusan.index');
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
