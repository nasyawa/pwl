<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Praktikum_1_Controller extends Controller
{
    public function home(){
        return view("home");
    }
    public function product(){
        return view("product");
    }
    public function news($id){
        if ($id==1){
            return redirect("https://www.educastudio.com/news");
        }else if ($id==2){
            redirect("https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitar-terdampak-covid-19");
        }
    }
    public function newshome(){
        return view ("news");
    }
    public function program(){
        return view("program");
    }
    public function about_us(){
        return view("about_us");
    }
    public function contact_us(){
        return view("contact_us");
    }
}
