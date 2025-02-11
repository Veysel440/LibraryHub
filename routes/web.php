<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/books', [BooksController::class, 'index'])->name('books');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


/*Route::middleware('auth')->group(function() {
    Route::get('/admin', function() {
        if (auth()->user()->user_type == 0) {
            return view('admin.index');
        } else {
            return redirect('/home');
        }
    })->name('admin.index');
});
*/
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::prefix('communication')->group(function () {
    Route::get('/', [CommunicationController::class, 'index'])->name('communication.index');
    Route::get('/create', [CommunicationController::class, 'create'])->name('communication.create');
    Route::post('/store', [CommunicationController::class, 'store'])->name('communication.store');
    Route::get('/{communication}/edit', [CommunicationController::class, 'edit'])->name('communication.edit');
    Route::put('/{communication}', [CommunicationController::class, 'update'])->name('communication.update');
    Route::delete('/{communication}', [CommunicationController::class, 'destroy'])->name('communication.destroy');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/books', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');
});


Route::prefix('admin')->group(function () {
    Route::get('/menus', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('admin.menu.store');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('slider', SliderController::class);
});

Route::prefix('admin/about')->name('admin.about.')->group(function () {
    Route::get('/', [AboutusController::class, 'index'])->name('index');
    Route::get('/create', [AboutusController::class, 'create'])->name('create');
    Route::post('/store', [AboutusController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AboutusController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [AboutusController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AboutusController::class, 'destroy'])->name('destroy');
});


Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');


