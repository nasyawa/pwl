<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return "Selamat Datang PageControll";
    }
    public function about(){
        return "2141720011 Nasyawa - PageControl";
    }
    public function article($id){
        return "Halaman Artikel dengan ID=$id";
    }
}
