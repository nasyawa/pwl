<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('beranda');
    }

    public function kuliah(){
        return view('sekolah');
    }

    public function profile(){
        return view('profile');
    }
}
