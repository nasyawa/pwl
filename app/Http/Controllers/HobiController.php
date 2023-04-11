<?php

namespace App\Http\Controllers;

use App\Models\hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hobi = hobi::all();
        return view('hobi.hobi')->with('hobi',$hobi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobi.create_hobi')->with('url_form', url('/hobi'));
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
            'jenishobi' => 'required|string|max:25',
            'waktu' => 'required|string|max:25',
        ]);

        $data = hobi::create($request->except(['_token']));
        return redirect('hobi')
        ->with('success','hobi Berhasil Ditambahkan');
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
        $hobi=hobi::find($id);
        return view('hobi.create_hobi')
        ->with('hobi',$hobi)
        ->with('url_form',url('/hobi/'.$id));
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
            'jenishobi' => 'required|string|max:25',
            'waktu' => 'required|string|max:25',
        ]);

        $data = hobi::where('id','=',$id)->update($request->except(['_token','_method']));
        return redirect('hobi')
        ->with('success','hobi Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hobi::where('id','=',$id)->delete();
        return redirect('hobi')
        ->with('success','hobi Berhasil Dihapus');
    }
}
