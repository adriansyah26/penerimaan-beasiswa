<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \abort_if_forbidden('sub-kriteria.view');

        $sub_kriteria = SubKriteria::all();

        return view('pages.sub-kriteria.index', compact('sub_kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \abort_if_forbidden('sub-kriteria.add');
        $kriteria     = Kriteria::all()->pluck('nama_kriteria', 'id');

        return view('pages.sub-kriteria.add', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \abort_if_forbidden('sub-kriteria.add');

        $this->validate($request,[
            'kriteria'     => ['required'],
            'sub_kriteria' => ['required']
        ]);

        $sub_kriteria = new SubKriteria;
        $sub_kriteria->kriteria_id = $request->kriteria;
        $sub_kriteria->sub_kriteria = $request->sub_kriteria;
        $sub_kriteria->created_at = now();
        $sub_kriteria->save();

        message_set('SubKriteria is Created!','success',2);
        return redirect()->route('sub-kriteria.index');
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
        \abort_if_forbidden('sub-kriteria.edit');

        $sub_kriteria = SubKriteria::find($id);
        $kriteria     = Kriteria::all();

        return view('pages.sub-kriteria.edit', compact('sub_kriteria', 'kriteria'));
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
        \abort_if_forbidden('sub-kriteria.edit');

        $sub_kriteria = SubKriteria::find($id);
        $sub_kriteria->kriteria_id = $request->kriteria;
        $sub_kriteria->sub_kriteria = $request->sub_kriteria;
        $sub_kriteria->updated_at = \now();
        $sub_kriteria->save();

        message_set('SubKriteria is Updated!','success',2);
        return redirect()->route('sub-kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \abort_if_forbidden('sub-kriteria.edit');

        $sub_kriteria = SubKriteria::find($id);
        $sub_kriteria->delete();

        message_set('SubKriteria is Deleted!','success',2);
        return redirect()->back();
    }
}
