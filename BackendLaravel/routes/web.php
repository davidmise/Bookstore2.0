<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chapati', function () {
    $chapati = [
        ['type' => 'chapati za maji', 'base' => 'Mayai','price' => 50 ],
        ['type' => 'chapati za kusukuma', 'base' => 'ngano', 'price' => 50],
        ['type' => 'chapati za ufuta','base' => 'ufuta','price' => 50]
    ];
   

    return view('chapati', $chapati );
});

Route::middleware(['auth'])->group( function () {
    Route::get('/author-profile',[AuthorsController::class])->name('author.profile');
    Route::get('/reader-profile',[UserController::class])->name('reader.profile');
});

