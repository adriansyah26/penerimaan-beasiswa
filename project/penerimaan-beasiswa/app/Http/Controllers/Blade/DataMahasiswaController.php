<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\MatriksKeputusan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('mahasiswa.view');
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = DB::table('mahasiswa')->get();

        return view('pages.data-mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if_forbidden('mahasiswa.add');
        return view('pages.data-mahasiswa.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if_forbidden('mahasiswa.add');
        $this->validate($request,[
            'nama_mahasiswa' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'integer', 'min:8'],
            'prodi' => ['required'],
            'semester' => ['required', 'integer', 'min:2', 'max:8'],
            'jumlah_tanggungan' => ['required', 'integer'],
            'pendapatan' => ['required', 'integer'],
            'ipk' => ['required'],
            'prestasi' => ['required', 'integer'],
            'alamat' => ['required', 'string'],
            'no_telepon' => ['required', 'min:11']
        ]);

        $data_mahasiswa                         = new Mahasiswa;
        $data_mahasiswa->nama                   = $request->nama_mahasiswa;
        $data_mahasiswa->nim                    = $request->nim;
        $data_mahasiswa->prodi                  = $request->prodi;
        $data_mahasiswa->semester               = $request->semester;
        $data_mahasiswa->jumlah_tanggungan      = intval($request->jumlah_tanggungan);
        $data_mahasiswa->penghasilan_orang_tua  = intval($request->pendapatan);
        $data_mahasiswa->ipk                    = floatval($request->ipk);
        $data_mahasiswa->prestasi               = intval($request->prestasi);
        $data_mahasiswa->alamat                 = $request->alamat;
        $data_mahasiswa->no_telepon             = $request->no_telepon;
        $data_mahasiswa->save();

        message_set('Data Mahasiswa is Created!','success',2);
        return redirect()->route('data-mahasiswa.index');
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
        \abort_if_forbidden('mahasiswa.edit');
        $mahasiswa = Mahasiswa::find($id);

        return \view('pages.data-mahasiswa.edit', \compact('mahasiswa'));
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
        \abort_if_forbidden('mahasiswa.edit');
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama                  = $request->nama_mahasiswa;
        $mahasiswa->nim                   = $request->nim;
        $mahasiswa->prodi                 = $request->prodi;
        $mahasiswa->semester              = $request->semester;
        $mahasiswa->jumlah_tanggungan     = $request->jumlah_tanggungan;
        $mahasiswa->penghasilan_orang_tua = $request->pendapatan;
        $mahasiswa->ipk                   = $request->ipk;
        $mahasiswa->prestasi              = $request->prestasi;
        $mahasiswa->alamat                = $request->alamat;
        $mahasiswa->no_telepon            = $request->no_telepon;
        $mahasiswa->save();

        message_set('Data Mahasiswa is Updated!','success',2);
        return redirect()->route('data-mahasiswa.index',);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if_forbidden('mahasiswa.delete');
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        // abort_if_forbidden('matriks-keputusan.delete');
        // $matriks_keputusan = MatriksKeputusan::find($id);
        // $matriks_keputusan->delete();

        message_set('Data Mahasiswa is deleted!','success',2);
        return redirect()->back();
    }

    public function print()
    {
        $mahasiswa = Mahasiswa::all();

        $pdf = PDF::loadview('pages.data-mahasiswa.print', compact('mahasiswa'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
