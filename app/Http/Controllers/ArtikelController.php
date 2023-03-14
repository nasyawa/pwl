<?php

namespace App\Http\Controllers;

use App\Models\ArtikelModel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        $query = ArtikelModel::all();
        return view('artikel')->with('data', $query);
    }
}
