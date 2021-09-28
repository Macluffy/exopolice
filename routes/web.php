<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','admin'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('pages.accueil');
});

Route::get('/testimonials', function () {
    return view('pages.testimonial');
});


Route::resource('/contact', ContactController::class)->middleware(['auth','admin']);

Route::resource('/article', ArticleController::class)->middleware(['auth','admin']);

Route::resource('/commentaire', CommentaireController::class)->middleware(['auth','admin']);

Route::resource('/backtestimonials', TestimonialController::class)->middleware(['auth','admin']);


