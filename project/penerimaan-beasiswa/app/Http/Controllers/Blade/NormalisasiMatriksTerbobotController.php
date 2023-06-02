<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\MatriksNormalisasi;
use App\Models\MatriksTerbobot;
use App\Models\NormalisasiMatriksKeputusan;
use Illuminate\Http\Request;

class NormalisasiMatriksTerbobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('normalisasi-matriks-terbobot.view');
        $matriks_terbobot = MatriksTerbobot::all();

        return view('pages.normalisasi-matriks-terbobot.index', \compact('matriks_terbobot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \abort_if_forbidden('normalisasi-matriks-terbobot.view');

        $mahasiswa = NormalisasiMatriksKeputusan::select(
            'normalisasi_matriks_keputusan.id as normalisasi_id',
            'normalisasi_matriks_keputusan.mahasiswa_id as id',
            'mahasiswa.nama as name',
            'normalisasi_matriks_keputusan.ipk',
            'normalisasi_matriks_keputusan.pendapatan',
            'normalisasi_matriks_keputusan.prestasi'
        )
        ->leftJoin('mahasiswa', 'mahasiswa.id', 'normalisasi_matriks_keputusan.mahasiswa_id')
        ->where('normalisasi_matriks_keputusan.is_select', 0)
        ->get()->pluck('name', 'id');

        return view('pages.normalisasi-matriks-terbobot.add', \compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \abort_if_forbidden('normalisasi-matriks-keputusan.view');
        $this->validate($request,[
            'mahasiswa' => ['required']
        ]);

        $mahasiswa = Mahasiswa::where('id', $request->mahasiswa)->first();

        $bobotIPK        = MatriksNormalisasi::where('kriteria_id', 1)->first();
        $bobotPendapatan = MatriksNormalisasi::where('kriteria_id', 2)->first();
        $bobotPrestasi   = MatriksNormalisasi::where('kriteria_id', 3)->first();

        $normalisasiMatriks_keputusan = NormalisasiMatriksKeputusan::select(
            'normalisasi_matriks_keputusan.id as matriks_keputusan_id',
            'normalisasi_matriks_keputusan.mahasiswa_id as id',
            'mahasiswa.nama as name',
            'normalisasi_matriks_keputusan.ipk',
            'normalisasi_matriks_keputusan.pendapatan',
            'normalisasi_matriks_keputusan.prestasi'
        )
        ->leftJoin('mahasiswa', 'mahasiswa.id', 'normalisasi_matriks_keputusan.mahasiswa_id')
        ->where('normalisasi_matriks_keputusan.is_select', 0)
        ->where('normalisasi_matriks_keputusan.mahasiswa_id', $request->mahasiswa)
        ->first();

        $bobotMatriks = new MatriksTerbobot;
        $bobotMatriks->mahasiswa_id = $request->mahasiswa;
        $bobotMatriks->ipk = $normalisasiMatriks_keputusan->ipk * $bobotIPK->bobot;
        $bobotMatriks->pendapatan = $normalisasiMatriks_keputusan->pendapatan * $bobotPendapatan->bobot;
        $bobotMatriks->prestasi = $normalisasiMatriks_keputusan->prestasi * $bobotPrestasi->bobot;

        $bobotMatriks->save();

        $chkNormalisasi = NormalisasiMatriksKeputusan::select(
            'normalisasi_matriks_keputusan.id as matriks_keputusan_id',
            'normalisasi_matriks_keputusan.mahasiswa_id as id',
            'mahasiswa.nama as name',
            'normalisasi_matriks_keputusan.ipk',
            'normalisasi_matriks_keputusan.pendapatan',
            'normalisasi_matriks_keputusan.prestasi'
        )
        ->leftJoin('mahasiswa', 'mahasiswa.id', 'normalisasi_matriks_keputusan.mahasiswa_id')
        ->where('normalisasi_matriks_keputusan.is_select', 0)
        ->where('normalisasi_matriks_keputusan.mahasiswa_id', $normalisasiMatriks_keputusan->id)
        ->first();

        $chkNormalisasi->where('mahasiswa_id', $mahasiswa->id)->update(['is_select' => 1]);

        message_set('Normalisasi Matriks Terbobot is Created!','success',2);
        return redirect()->route('normalisasi-matriks-terbobot.index');
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
