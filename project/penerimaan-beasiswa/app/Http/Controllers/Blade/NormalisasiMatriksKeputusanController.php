<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\MatriksKeputusan;
use App\Models\NormalisasiMatriksKeputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NormalisasiMatriksKeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('normalisasi-matriks-keputusan.view');

        $normalisasi_matriks_keputusan = NormalisasiMatriksKeputusan::all();

        return view('pages.normalisasi-matriks-keputusan.index', \compact('normalisasi_matriks_keputusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \abort_if_forbidden('normalisasi-matriks-keputusan.view');

        $mahasiswa = MatriksKeputusan::select(
            'matriks_keputusan.id as matriks_keputusan_id',
            'matriks_keputusan.mahasiswa_id as id',
            'mahasiswa.nama as name',
            'matriks_keputusan.ipk',
            'matriks_keputusan.pendapatan',
            'matriks_keputusan.prestasi'
        )
        ->leftJoin('mahasiswa', 'mahasiswa.id', 'matriks_keputusan.mahasiswa_id')
        ->where('matriks_keputusan.is_select', 0)
        ->get()->pluck('name', 'id');

        return view('pages.normalisasi-matriks-keputusan.add', \compact('mahasiswa'));
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

        $matriksKeputusan = MatriksKeputusan::select(
            DB::raw('sqrt(sum(pow(ipk, 2))) as ipk'),
            DB::raw('sqrt(sum(pow(pendapatan, 2))) as pendapatan'),
            DB::raw('sqrt(sum(pow(prestasi, 2))) as prestasi')
        )->get();

        foreach ($matriksKeputusan as $key => $keputusan) {
            $keputusan;
        }

        $chkMatriksKeputusan = MatriksKeputusan::select(
            'matriks_keputusan.id as matriks_keputusan_id',
            'matriks_keputusan.mahasiswa_id as id',
            'mahasiswa.nama as name',
            'matriks_keputusan.ipk',
            'matriks_keputusan.pendapatan',
            'matriks_keputusan.prestasi',
            'matriks_keputusan.is_select'
        )
        ->leftJoin('mahasiswa', 'mahasiswa.id', 'matriks_keputusan.mahasiswa_id')
        ->where('matriks_keputusan.is_select', 0)
        ->where('matriks_keputusan.mahasiswa_id', $mahasiswa->id)
        ->first();

        $normalisasi               = new NormalisasiMatriksKeputusan;
        $normalisasi->mahasiswa_id = $chkMatriksKeputusan->id;
        $normalisasi->ipk          = \doubleval($chkMatriksKeputusan->ipk / $keputusan->ipk);
        $normalisasi->pendapatan   = \doubleval($chkMatriksKeputusan->pendapatan / $keputusan->pendapatan);
        $normalisasi->prestasi     = \doubleval($chkMatriksKeputusan->prestasi / $keputusan->prestasi);
        $normalisasi->created_at   = \now();
        $normalisasi->save();

        // $chkMahasiswa_matriksKeputusan = MatriksKeputusan::select(
        //     'matriks_keputusan.id as matriks_keputusan_id',
        //     'matriks_keputusan.mahasiswa_id as id',
        //     'mahasiswa.nama as name',
        //     'matriks_keputusan.ipk',
        //     'matriks_keputusan.pendapatan',
        //     'matriks_keputusan.prestasi'
        // )
        // ->leftJoin('mahasiswa', 'mahasiswa.id', 'matriks_keputusan.mahasiswa_id')
        // ->where('matriks_keputusan.is_select', 0)
        // ->where('matriks_keputusan.id', $chkMatriksKeputusan->matriks_keputusan_id)
        // ->first();

        $chkMatriksKeputusan->where('mahasiswa_id', $mahasiswa->id)->update(['is_select' => 1]);

        message_set('Normalisasi Matriks Keputusan is Created!','success',2);
        return redirect()->route('normalisasi-matriks-keputusan.index');
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
