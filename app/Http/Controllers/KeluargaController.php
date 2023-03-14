<?php

namespace App\Http\Controllers;

use App\Models\keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index(){
        $query=keluarga::all();
        return view('keluarga')->with('data',$query);
    }
}
