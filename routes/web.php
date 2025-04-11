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
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('slider', SliderController::class);
    Route::resource('communication', CommunicationController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('books', BookController::class);
    Route::resource('about', AboutusController::class);
    Route::resource('users', UserController::class);
});

Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
