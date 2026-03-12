<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Models\Tentang;
use App\Models\Gallery;
use App\Models\Berita;
use App\Http\Controllers\Admin\TentangController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\BeritaUserController;
//use App\Http\Controllers\Admin\DashboardController;




/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('frontend.home', [
        'tentangs'  => Tentang::all(),
        'galleries' => Gallery::latest()->limit(6)->get(),
        'beritas'   => Berita::latest()->get(),
    ]);
})->name('home');

Route::get('/tentang', function () {
    $tentangs = Tentang::all();
    return view('frontend.tentang', compact('tentangs'));
})->name('tentang');

Route::get('/gallery', function () {
    $carousel = Gallery::latest()->take(5)->get();
$galleries = Gallery::latest()->paginate(8);

return view('frontend.gallery', compact('carousel','galleries'));
})->name('gallery');

Route::get('/berita', [BeritaUserController::class, 'index'])
    ->name('berita.user');

Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('kontak');

Route::post('/kontak', [ContactController::class, 'store'])
    ->name('kontak.store');


/*
|--------------------------------------------------------------------------
| DASHBOARD (WAJIB UNTUK BREEZE)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN (KONTAK)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->group(function () {

    // DASHBOARD ADMIN  ✅ DI SINI
    //Route::get('/', [DashboardController::class, 'index'])
       // ->name('admin.dashboard');

    // KONTAK
    Route::get('/kontak', [ContactController::class, 'index'])
        ->name('admin.kontak.index');

    Route::delete('/kontak/{id}', [ContactController::class, 'destroy'])
        ->name('admin.kontak.destroy');

    Route::resource('tentang', TentangController::class)
        ->names('admin.tentang');

    // Gallery admin
    Route::resource('gallery',AdminGalleryController::class)
        ->names('admin.gallery');

    Route::resource('berita', BeritaController::class)
            ->parameters(['berita' => 'berita']);

            Route::post('/logout', function (Request $request) {

        Route::post('/logout', function () {
            Auth::logout();
            return redirect('/');
        })->name('logout');
    });

    });






/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
