<?php

namespace App\Http\Controllers;

use App\Models\keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluarga = keluarga::all();
        return view('keluarga.keluarga')->with('keluarga',$keluarga);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keluarga.create_keluarga')->with('url_form', url('/keluarga'));
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
            'nama' => 'required|string|max:10',
        ]);

        $data = keluarga::create($request->except(['_token']));
        return redirect('keluarga')
        ->with('success','Anggota Keluarga Ditambahkan');
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
        $keluarga=keluarga::find($id);
        return view('keluarga.create_keluarga')
        ->with('keluarga',$keluarga)
        ->with('url_form',url('/keluarga/'.$id));
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
            'nama' => 'required|string|max:50',
        ]);

        $data = keluarga::where('id','=',$id)->update($request->except(['_token','_method']));
        return redirect('keluarga')
        ->with('success','keluarga Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        keluarga::where('id','=',$id)->delete();
        return redirect('keluarga')
        ->with('success','keluarga Berhasil Dihapus');
    }
}
