<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\BorrowReturnController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return to_route('books.index');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get("/books/{book}/borrow", [BookController::class , "borrow"])->middleware(['auth', 'verified'])->name('books.borrow');
Route::get("/books/{book}/borrow/{student}", [BookController::class , "confirm"])->middleware(['auth', 'verified'])->name('books.confirm');
Route::get('/books/category/{category:slug}', [BookController::class, "category"])->name("books.category");
Route::get("/books/search", [BookController::class, "search"])
->middleware(['auth', 'verified'])->name("books.search");

// Route::get("/borrow", [BorrowController::class , "index"])->middleware(['auth', 'verified'])->name('borrows.index');
Route::resource("borrows", BorrowController::class)->middleware(['auth', 'verified']);
Route::post("/books/{book}/borrow/{student}", [BorrowController::class , "store"])->middleware(['auth', 'verified'])->name('books.confirm.store');


Route::post("/borrows/{borrow}", [BorrowReturnController::class , "store"])->middleware(['auth', 'verified'])->name('borrow_returns.store');


Route::resource("ayams", BookController::class)->middleware(['auth', 'verified']);

// Route::get('/ayams', [BookController::class, "index"]);
// Route::post('/ayams', [BookController::class, "store"]);
// Route::put('/ayams/{ayam}', [BookController::class, "update"]);

Route::resource("books", BookController::class)->middleware(['auth', 'verified']);
Route::resource("authors", AuthorController::class)->middleware(['auth', 'verified']);
Route::resource("publishers", PublisherController::class)->middleware(['auth', 'verified']);
Route::resource("students", StudentController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
