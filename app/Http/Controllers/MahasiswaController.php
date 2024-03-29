<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\keluarga;
use Illuminate\Http\Request;
use PDF;
use Storage;
use Validator;
use Yajra\DataTables\DataTables;

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
        // $mahasiswa= Mahasiswa::with('kelas')->get();
        // $paginate = Mahasiswa::orderBy('id','asc')->paginate(5);
        //return view('mahasiswa.mahasiswa')->with('mhs',$mhs);
        // return view('mahasiswa.mahasiswa',['mhs'=> $mahasiswa,'paginate'=>$paginate]);
        return view ('mahasiswa.mahasiswa');
    }
    public function data()
    {
        $data = Mahasiswa::selectRaw('id, nim, nama, hp');

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
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
    // public function store(Request $request)
    // {
    //     //Validasi
    //     $request->validate([
    //         'nim' => 'required|string|max:10|unique:mahasiswa,nim',
    //         'nama' => 'required|string|max:50',
    //         'kelas_id'=>'required|string',
    //         'jk' => 'required|in:l,p',
    //         'tempat_lahir' => 'required|string|max:50',
    //         'tanggal_lahir' => 'required|date',
    //         'alamat' => 'required|string|max:255',
    //         'hp' => 'required|digits_between:6,15',
    //         'foto'=> 'required|file',
    //     ]);
    //     // $data = Mahasiswa::create($request->except(['_token']));
    //     // return redirect('mahasiswa')
    //     // ->with('success','Mahasiswa Berhasil Ditambahkan');
    //     if ($request->file('foto')){
    //         $image_name = $request->file('foto')->store('image','public');
    //     }
    //     $mahasiswa= new Mahasiswa;
    //     $mahasiswa->nim = $request->get('nim');
    //     $mahasiswa->nama= $request->get('nama');
    //     $mahasiswa->jk = $request->get('jk');
    //     $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
    //     $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
    //     $mahasiswa->alamat = $request->get('alamat');
    //     $mahasiswa->hp = $request->get('hp');
    //     $mahasiswa->foto=$image_name;
    //     $mahasiswa->save();

    //     $kelas = new kelas;
    //     $kelas->id = $request->get('kelas_id');

    //     //fungsi eloquent untk menambah data dengan relasi belongsTo
    //     $mahasiswa->kelas()->associate($kelas);
    //     $mahasiswa->save();
        
    //     //jika data berhasil ditambahkan, akan kembali ke halaman utama
    //     return redirect('mahasiswa')
    //         ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    // }
    // untuk menangkap request simpan data mahasiswa baru di controller
public function store(Request $request)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = Mahasiswa::create($request->all());
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
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
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
    //         'nama' => 'required|string|max:50',
    //         'kelas_id'=>'required',
    //         'jk' => 'required|in:l,p',
    //         'tempat_lahir' => 'required|string|max:50',
    //         'tanggal_lahir' => 'required|date',
    //         'alamat' => 'required|string|max:255',
    //         'hp' => 'required|digits_between:6,15',
    //         'foto'=> 'required|file',
    //     ]);

    //     $mahasiswa= Mahasiswa::with('kelas')->where('id',$id)->first();

    //     if($mahasiswa->foto && file_exists(storage_path('app/public/'.$mahasiswa->foto))){
    //         Storage::delete('public/'.$mahasiswa->foto);
    //     }

    //     $image_name=$request->file('foto')->store('image','public');
    //     $mahasiswa->foto = $image_name;        
        
    //     $mahasiswa->nim = $request->get('nim');
    //     $mahasiswa->nama= $request->get('nama');
    //     $mahasiswa->jk = $request->get('jk');
    //     $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
    //     $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
    //     $mahasiswa->alamat = $request->get('alamat');
    //     $mahasiswa->hp = $request->get('hp');
    //     $mahasiswa->save();

    //     $kelas= new Kelas;
    //     $kelas->id=$request->get('kelas_id');
    //      //fungsi eloquent untk menambah data dengan relasi belongsTo
    //      $mahasiswa->kelas()->associate($kelas);
    //      $mahasiswa->save();
    //      //jika data berhasil ditambahkan, akan kembali ke halaman utama
    //      return redirect()->route('mahasiswa.index')
    //          ->with('success', 'Mahasiswa Berhasil Diupdate');
    //     // $data = Mahasiswa::where('id','=',$id)->update($request->except(['_token','_method']));
    //     // return redirect('mahasiswa')
    //     // ->with('success','Mahasiswa Berhasil Diedit');
        
    // }
    public function update(Request $request, $id)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = Mahasiswa::where('id', $id)->update($request->except('_token', '_method'));

        return response()->json([
            'status' => ($mhs),
            'modal_close' => $mhs,
            'message' => ($mhs)? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mahasiswa::find($id);
        Storage::delete('public/'.$data->foto);
        $data->delete();
        return redirect('mahasiswa')
        ->with('success','Mahasiswa Berhasil Dihapus');
    }
}
