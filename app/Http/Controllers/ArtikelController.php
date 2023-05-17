<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\ArtikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArtikelModel::all();
        return view('artikel')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create')->with('url_form', (url('/artikel')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image')){
            $image_name = $request->file('image')->store('image','public');
        }
        ArtikelModel::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured_image'=>$image_name,
        ]);
        //return 'Artikel berhasil disimpan';
        return redirect('artikel');
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
        $article=ArtikelModel::find($id);
        return view('articles.edit',['article'=>$article])->with('url_form', url('artikel/'.$id));
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
        $article = ArtikelModel::find($id);

        $article->title =$request->title;
        $article->content=$request->content;

        if($article->featured_image && file_exists(storage_path('app/public/'.$article->featured_image))){
            Storage::delete('public/'.$article->featured_image);
        }
        $image_name=$request->file('image')->store('image','public');
        $article->featured_image=$image_name;

        $article->save();
        return redirect('artikel');
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

    public function cetak_pdf(){
        $articles = ArtikelModel::all();
        $pdf = PDF::loadview('articles.articles_pdf',['articles'=>$articles]);
        return $pdf->stream();
    }
}
