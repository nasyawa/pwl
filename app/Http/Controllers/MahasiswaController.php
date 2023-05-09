<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\keluarga;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //semula Mahasiswa::all, diubah jd with yg menyatakan relasi 
        //$mhs = Mahasiswa::all();
        $mahasiswa= Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('id','asc')->paginate(5);
        //return view('mahasiswa.mahasiswa')->with('mhs',$mhs);
        return view('mahasiswa.mahasiswa',['mhs'=> $mahasiswa,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('mahasiswa.create_mahasiswa')->with('url_form', url('/mahasiswa'));
        $kelas = Kelas::all(); //mendapat data dari tabel kelas
        return view('mahasiswa.create_mahasiswa',['kelas'=>$kelas, 'url_form' => route('mahasiswa.store')]);
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
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'kelas_id'=>'required|string',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
        ]);
        // $data = Mahasiswa::create($request->except(['_token']));
        // return redirect('mahasiswa')
        // ->with('success','Mahasiswa Berhasil Ditambahkan');
        $mahasiswa= new Mahasiswa;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama= $request->get('nama');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->hp = $request->get('hp');
        $mahasiswa->save();

        $kelas = new kelas;
        $kelas->id = $request->get('kelas_id');

        //fungsi eloquent untk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //menampilkan detail data berdasar nim mhs
        //code seblum dibuat relasi-->$mahasiswa=Mahasiswa::find($Nim);
        $mahasiswa=Mahasiswa::with('kelas')->where('id',$id)->first();
        return view('mahasiswa.detail_mhs',['mahasiswa'=>$mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dg menemukan bim mhs untuk diedit
        // $mahasiswa=Mahasiswa::find($id);
        // return view('mahasiswa.create_mahasiswa')
        // ->with('mhs',$mahasiswa)
        // ->with('url_form',url('/mahasiswa/'.$id));
        $mahasiswa=Mahasiswa::with('kelas')->where('id',$id)->first();
        $kelas= Kelas::all(); //mendapat data diri dri tabel
        return view('mahasiswa.create_mahasiswa')
        ->with('mhs', $mahasiswa)
        ->with('kelas', $kelas)
        ->with('url_form', url('/mahasiswa/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'kelas_id'=>'required',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
        ]);
        $mahasiswa= Mahasiswa::with('kelas')->where('id',$id)->first();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama= $request->get('nama');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->hp = $request->get('hp');
        $mahasiswa->save();

        $kelas= new Kelas;
        $kelas->id=$request->get('kelas_id');
         //fungsi eloquent untk menambah data dengan relasi belongsTo
         $mahasiswa->kelas()->associate($kelas);
         $mahasiswa->save();
         //jika data berhasil ditambahkan, akan kembali ke halaman utama
         return redirect()->route('mahasiswa.index')
             ->with('success', 'Mahasiswa Berhasil Diupdate');



        // $data = Mahasiswa::where('id','=',$id)->update($request->except(['_token','_method']));
        // return redirect('mahasiswa')
        // ->with('success','Mahasiswa Berhasil Diedit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::where('id','=',$id)->delete();
        return redirect('mahasiswa')
        ->with('success','Mahasiswa Berhasil Dihapus');
    }
}
