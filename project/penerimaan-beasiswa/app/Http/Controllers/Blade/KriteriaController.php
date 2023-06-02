<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('kriteria.view');
        $kriteria = Kriteria::all();

        return view('pages.kriteria.index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if_forbidden('kriteria.add');
        return view('pages.kriteria.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if_forbidden('kriteria.add');
        $this->validate($request,[
            'kriteria' => ['required', 'unique:kriteria,nama_kriteria']
        ]);

        $kriteria                = new Kriteria;
        $kriteria->nama_kriteria = $request->kriteria;
        $kriteria->created_at    = now();
        $kriteria->save();

        message_set('Kriteria is Created!','success',2);
        return redirect()->route('kriteria.index');
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
        abort_if_forbidden('kriteria.edit');
        $kriteria = Kriteria::find($id);

        return view('pages.kriteria.edit', \compact('kriteria'));
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
        abort_if_forbidden('kriteria.edit');
        $kriteria                = Kriteria::find($id);
        $kriteria->nama_kriteria = $request->kriteria;
        $kriteria->updated_at    = now();
        $kriteria->save();

        message_set('Kriteria is Updated!','success',2);
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if_forbidden('kriteria.delete');
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        message_set('Kriteria is Deleted!','success',2);
        return redirect()->back();
    }
}
