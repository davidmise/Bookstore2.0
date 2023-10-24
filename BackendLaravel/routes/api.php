<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReviewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// target TestController , function index
Route::get('/root', [TestController::class, "index"]);
Route::get('/users',[UserController::class, "index"]);
Route::get('/users/{id}',[UserController::class, "show"]);
Route::post('/register',[AuthenticationController::class, "create"]);
Route::put('/users',[UserController::class, "edit"]);
Route::delete('/users/{id}',[UserController::class, "destroy"]);


Route::post('/login',[AuthenticationController::class, "login"]);

// authors (post and get)
Route::post('/authors',[AuthorsController::class, "create"]);
Route::get('/getAuthors',[AuthorsController::class, "index"]);
Route::get('/authors/{id}',[AuthorsController::class, "show"]);
Route::put('/authors/{id}',[AuthorsController::class, "update"]);
Route::delete('/authors',[AuthorsController::class, "destroy"]);
Route::get('/search_authors',[AuthorsController::class, "searchAuthors"]);

// genres (post and get)
Route::post('/genres',[GenreController::class, "create"]);
Route::get('/genres',[GenreController::class, "show"]);
Route::get('/fetchGenres',[GenreController::class, "index"]);
Route::put('/genres',[GenreController::class, "edit"]);
Route::delete('/genres',[GenreController::class, "destroy"]);


// books (post and get)

 // Protected routes go here
 Route::post('/books',[BooksController::class, "create"]);
 Route::get('/books',[BooksController::class, "index"]) ;
 Route::put('/books',[BooksController::class, "edit"]) ;
 Route::delete('/books',[BooksController::class, "destroy"]) ;
 // search and filter(books)
 Route::get('/searchbooks',[BooksController::class, "searchBooks"]) ;
 Route::get('/filterbooks',[BooksController::class, "filterBooks"]) ;
 Route::get('/books/{id}',[BooksController::class, "show"]) ;
  // Your protected API routes go here
    
// order (post and get)
Route::post('/orders',[OrdersController::class, "create"]);
Route::get('/orders/{id}',[OrdersController::class, "show"]);
Route::put('/orders',[OrdersController::class, "edit"]);
Route::delete('/orders',[OrdersController::class, "destroy"]);

// order items (post and get)
Route::post('/order_items',[OrderItemsController::class, "create"]);
Route::get('/order_items/{id}',[OrderItemsController::class, "show"]);
Route::put('/order_items',[OrderItemsController::class, "edit"]);
Route::delete('/order_items',[OrderItemsController::class, "destroy"]);

// reviews (post and get)
Route::post('/reviews',[ReviewsController::class, "create"]);
Route::get('/reviews/{id}',[ReviewsController::class, "show"]);
Route::put('/reviews',[ReviewsController::class, "edit"]);
Route::delete('/reviews',[ReviewsController::class, "destroy"]);
