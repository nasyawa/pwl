<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(){
        $query=matakuliah::all();
        return view('matkul')->with('data',$query);
    }
}
