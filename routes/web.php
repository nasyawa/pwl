<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Prak3Controller;
use App\Http\Controllers\Praktikum_1_Controller;
use App\Models\keluarga;
use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', function () {
//        echo "Selamat Datang";
//        });
//Route::get('/about', function () {
//        echo "2141720011 Nasyawa";
//        });
//Route::get('/articles/{id}', function ($id) {
//        echo "Halaman Artikel dengan ID=$id";
//        });

//Route::get('/', [HomeeController::class, 'index']);
//Route::get('/about', [AboutController::class, 'about']);
//Route::get('/article/{id}', [ArticleController::class, 'article']);

//PRAKTIKUM 1 Pertemuan 3
//route home
// Route::get('/',[Praktikum_1_Controller::class,'home']);

// //route prefix product
// Route::prefix('product')->group(function(){
//         Route::get('/',[Praktikum_1_Controller::class,'product']);
//         Route::get('/1',function(){
//                 return redirect("https://www.educastudio.com/category/marbel-edu-games");
//         });
//         Route::get('/2',function(){
//                 return redirect("https://www.educastudio.com/category/marbel-and-friends-kids-games");
//         });
//         Route::get('/3',function(){
//                 return redirect("https://www.educastudio.com/category/riri-story-books");
//         });
//         Route::get('/4',function(){
//                 return redirect("https://www.educastudio.com/category/kolak-kids-songs");
//         });
// });
// //route param news
// Route::get('/news',[Praktikum_1_Controller::class,'newshome']);
// Route::get('/news/{id}',[Praktikum_1_Controller::class,'news']);

// // route prefix program
// Route::prefix('program')->group(function(){
//         Route::get('/',[Praktikum_1_Controller::class,'program']);
//         Route::get('/karir', function(){
//                 return redirect("https://www.educastudio.com/program/karir");
//         });
//         Route::get('/magang', function(){ 
//                 return redirect("https://www.educastudio.com/program/magang");
//         }); 
//         Route::get('/kunjungan', function(){ 
//                 return redirect("https://www.educastudio.com/program/kunjungan-industri"); 
//         });
// });

// //route biasa about us
// Route::get('/aboutus',[Praktikum_1_Controller::class,'about_us']);
// //rpute contact us
// Route::get('/contactus',[Praktikum_1_Controller::class,'contact_us']);

//PRAKTIKUM 2
//home
// Route::get('/',[HomeController::class,'home']); 
// Route::get('/profile', [HomeController::class, 'profile']);
// Route::get('/kuliah', [HomeController::class, 'kuliah']);

// Route::get('/artikelnasya',[ArtikelController::class,'index']);

 //PRAKTIKUM 4 lanjut
 // Route::get('/hobi',[HobiController::class,'index']);
 // Route::get('/keluarga',[KeluargaController::class,'index']);
 // Route::get('/matakuliah',[MatakuliahController::class,'index']);


       


            
    

Auth::routes();
Route::get('/logout',[LoginController::class,'logout']);

Route::middleware(['auth'])->group(function(){
    //semua url masuk sini
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/',[HomeController::class,'index']); 
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::get('/kuliah', [HomeController::class, 'kuliah']);

    
    Route::get('/artikel/cetak_pdf', [ArtikelController::class,'cetak_pdf']);
    Route::get('/nilai/{id}/cetak', [NilaiController::class, 'cetak']);
    Route::post('/mahasiswa/data', [MahasiswaController::class, 'data']);

    Route::resource('/matakuliah',MatakuliahController::class);
    Route::resource('/keluarga',KeluargaController::class);
    Route::resource('/hobi',HobiController::class);
    Route::resource('/mahasiswa',MahasiswaController::class);
    Route::resource('/nilai', NilaiController::class);
    Route::resource('/artikel', ArtikelController::class);
    Route::resource('/organisasi',OrganisasiController::class);
    
});
