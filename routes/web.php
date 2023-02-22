<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeeController;
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

Route::get('/', [HomeeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/article/{id}', [ArticleController::class, 'article']);


            
    
