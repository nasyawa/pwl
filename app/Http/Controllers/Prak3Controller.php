<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Prak3Controller extends Controller
{
    public function home(){
        return "Selamat Datang Halaman Awal Website";
    }

    public function product(){
        echo "
        <ul>
            <li>
            <a href='product/1'>Pilihan 1</a>
            </li>
            <li>
            <a href='product/2'> Pilihan 2 </a>
            </li>
            <li>
            <a href='product/3'> Pilihan 3  </a>
            </li>
            <li>
            <a href='product/4'> Pilihan 4  </a>
            </li>

        </ul>";
    }

    public function news(){
        echo "
            <ul>
                <li>
                    <a href='news/1'>news 1</a>
                </li>
                <li>
                    <a href='news/2'>news 2</a>
                </li>
            </ul>
        ";
    }

    public function program(){
        echo"
        <ul>
            <li>
                <a href='/program/karir'>prog1</a>
            </li>
            <li>
                <a href='/program/magang'>prog 2</a>
            </li>
            <li>
                <a href='/program/kunjungan'>nprog3</a>
            </li>
    </ul>
        ";
    }
    public function aboutus(){
        return redirect("https://www.educastudio.com/about-us");
    }

    public function contactus(){
        return 'Thankyou<br>
        <ul> 
        <li>Intagram: nasya_kiranaa</li>
        <li>WA: o797894803</li>
        </ul>';
    }
}
