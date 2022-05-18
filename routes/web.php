<?php

use App\Http\Controllers\SignatureController;
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

// Route::get('/', function () {
//     return inertia('Welcome');
// });

Route::get('/', function () {
    return inertia('SignatureForm');
});

// Route::get('/signature/gallery', function () {
//     return inertia('SignatureGallery');
// });

Route::get('/signature/gallery',[SignatureController::class, 'index'])->name('gallery');
Route::post('/signature/store',[SignatureController::class, 'store'])->name('upload');
    
    

