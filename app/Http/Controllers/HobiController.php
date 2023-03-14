<?php

namespace App\Http\Controllers;

use App\Models\hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
   public function index(){
    $query = hobi::all();
    return view('hobi')->with('data',$query);
   } 
}
