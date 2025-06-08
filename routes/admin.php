<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\AboutStoryController;
use App\Http\Controllers\Admin\AboutReferenceController;
use App\Http\Controllers\Admin\AboutImageController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\AdminEmailController;
use App\Http\Controllers\Admin\SliderController;

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

    // Feature Routes
    Route::resource('features', FeatureController::class);
    Route::post('feature-settings', [FeatureController::class, 'updateSettings'])->name('feature-settings.update');

    // About Routes
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');

    // About Stories Routes
    Route::resource('about/stories', AboutStoryController::class)->names([
        'index' => 'about.stories.index',
        'create' => 'about.stories.create',
        'store' => 'about.stories.store',
        'edit' => 'about.stories.edit',
        'update' => 'about.stories.update',
        'destroy' => 'about.stories.destroy',
    ]);

    // About References Routes
    Route::resource('about/references', AboutReferenceController::class)->names([
        'index' => 'about.references.index',
        'create' => 'about.references.create',
        'store' => 'about.references.store',
        'edit' => 'about.references.edit',
        'update' => 'about.references.update',
        'destroy' => 'about.references.destroy',
    ]);

    // About Images Routes
    Route::resource('about/images', AboutImageController::class)->names([
        'index' => 'about.images.index',
        'create' => 'about.images.create',
        'store' => 'about.images.store',
        'edit' => 'about.images.edit',
        'update' => 'about.images.update',
        'destroy' => 'about.images.destroy',
    ]);

    // Video Routes
    Route::get('video', [VideoController::class, 'index'])->name('video.index');
    Route::get('video/edit', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('video', [VideoController::class, 'update'])->name('video.update');

    // Blog Routes
    Route::resource('blogs', BlogController::class);
    Route::get('blogs/{blog}/delete-image/{image}', [BlogController::class, 'deleteImage'])->name('blogs.images.delete');

    // Contact Routes
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::put('contact', [ContactController::class, 'update'])->name('contact.update');

    // Message Routes
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('messages/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.mark-as-read');

    // Site Settings Routes
    Route::get('/settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
    
    Route::get('/emails', [AdminEmailController::class, 'index'])->name('emails.index');
    Route::post('/emails', [AdminEmailController::class, 'store'])->name('emails.store');
    Route::delete('/emails/{email}', [AdminEmailController::class, 'destroy'])->name('emails.destroy');
    Route::put('/emails/{email}/toggle-status', [AdminEmailController::class, 'toggleStatus'])->name('emails.toggle-status');

    // Slider Routes
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::put('/sliders/settings', [SliderController::class, 'updateSettings'])->name('sliders.update-settings');
    Route::post('/sliders/images', [SliderController::class, 'storeImage'])->name('sliders.store-image');
    Route::post('/sliders/images/order', [SliderController::class, 'updateImageOrder'])->name('sliders.update-image-order');
    Route::delete('/sliders/images/{image}', [SliderController::class, 'destroyImage'])->name('sliders.destroy-image');
});

