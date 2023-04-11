<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkul = matakuliah::all();
        return view('matkul.matkul')->with('matkul',$matkul);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matkul.create_matkul')->with('url_form', url('/matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //Validasi
                $request->validate([
                    'matkul' => 'required|string|max:100',
                ]);
        
                $data = matakuliah::create($request->except(['_token']));
                return redirect('matakuliah')
                ->with('success','Matakuliah Berhasil Ditambahkan');
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
        $matkul=matakuliah::find($id);
        return view('matkul.create_matkul')
        ->with('matkul',$matkul)
        ->with('url_form',url('/matakuliah/'.$id));
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
        $request->validate([
            'matkul' => 'required|string|max:100',
        ]);

        $data = matakuliah::where('id','=',$id)->update($request->except(['_token','_method']));
        return redirect('matakuliah')
        ->with('success','Matakuliah Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        matakuliah::where('id','=',$id)->delete();
        return redirect('matakuliah')
        ->with('success','Matakuliah Berhasil Dihapus');
    }
}
