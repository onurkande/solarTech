<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin panel routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group.
|
*/

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');

    // Product Routes
    Route::resource('products', ProductController::class);
    Route::post('product-settings', [ProductController::class, 'updateSettings'])->name('product-settings.update');

    // Site Settings Routes
    Route::get('site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
    Route::put('site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');

    // About Routes
    Route::get('abouts', [AboutController::class, 'index'])->name('abouts.index');
    Route::put('abouts', [AboutController::class, 'update'])->name('abouts.update');
    Route::put('about-settings', [AboutController::class, 'updateSettings'])->name('about-settings.update');

    // Counter Routes
    Route::prefix('counters')->name('counters.')->group(function () {
        Route::get('/', [CounterController::class, 'index'])->name('index');
        Route::post('/', [CounterController::class, 'store'])->name('store');
        Route::put('/', [CounterController::class, 'update'])->name('update');
        Route::get('/delete/{counter}', [CounterController::class, 'destroy'])->name('destroy');
    });

    // Counter Settings Routes
    Route::prefix('counter-settings')->name('counter-settings.')->group(function () {
        Route::put('/', [CounterController::class, 'updateSettings'])->name('update');
    });

    // Feature Routes
    Route::prefix('features')->name('features.')->group(function () {
        Route::get('/', [FeatureController::class, 'index'])->name('index');
        Route::post('/', [FeatureController::class, 'store'])->name('store');
        Route::put('/', [FeatureController::class, 'update'])->name('update');
        Route::get('/delete/{feature}', [FeatureController::class, 'destroy'])->name('destroy');
    });

    // Feature Settings Routes
    Route::prefix('feature-settings')->name('feature-settings.')->group(function () {
        Route::put('/', [FeatureController::class, 'updateSettings'])->name('update');
    });

    // Video Routes
    Route::prefix('videos')->name('videos.')->group(function () {
        Route::get('/', [VideoController::class, 'index'])->name('index');
        Route::post('/', [VideoController::class, 'store'])->name('store');
        Route::put('/', [VideoController::class, 'update'])->name('update');
        Route::get('/delete/{video}', [VideoController::class, 'destroy'])->name('destroy');
    });

    // Video Settings Routes
    Route::prefix('video-settings')->name('video-settings.')->group(function () {
        Route::put('/', [VideoController::class, 'updateSettings'])->name('update');
    });

    // Comment Routes
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::post('/', [CommentController::class, 'store'])->name('store');
        Route::put('/', [CommentController::class, 'update'])->name('update');
        Route::get('/delete/{comment}', [CommentController::class, 'destroy'])->name('destroy');
    });

    // Comment Settings Routes
    Route::prefix('comment-settings')->name('comment-settings.')->group(function () {
        Route::put('/', [CommentController::class, 'updateSettings'])->name('update');
    });

    // Question Routes
    Route::prefix('questions')->name('questions.')->group(function () {
        Route::get('/', [QuestionController::class, 'index'])->name('index');
        Route::post('/', [QuestionController::class, 'store'])->name('store');
        Route::put('/', [QuestionController::class, 'update'])->name('update');
        Route::get('/delete/{question}', [QuestionController::class, 'destroy'])->name('destroy');
    });

    // Question Settings Routes
    Route::prefix('question-settings')->name('question-settings.')->group(function () {
        Route::put('/', [QuestionController::class, 'updateSettings'])->name('update');
    });

    // Contact Routes
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::put('/', [ContactController::class, 'update'])->name('update');
    });

    // Contact Messages Routes
    Route::prefix('contact-messages')->name('contact-messages.')->group(function () {
        Route::get('/', [ContactMessageController::class, 'index'])->name('index');
        Route::get('/mark-as-read/{message}', [ContactMessageController::class, 'markAsRead'])->name('mark-as-read');
        Route::get('/delete/{message}', [ContactMessageController::class, 'destroy'])->name('destroy');
    });
});

