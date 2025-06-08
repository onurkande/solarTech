<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\IndexController;
use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\MessageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');

Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');

Route::get('/blog', [BlogController::class, 'index'])->name('blogs');

Route::get('/blog-detay/{slug}', [BlogController::class, 'show'])->name('blog-details');

Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');


require __DIR__.'/admin.php';