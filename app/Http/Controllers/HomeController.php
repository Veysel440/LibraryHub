<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Book;
use App\Models\Menu;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::latest()->take(4)->get();
        $aboutUs = About::first();
        $sliders = Slider::all();
        $menus = Menu::all();
        return view('home.index', compact('books', 'aboutUs', 'sliders','menus'));
    }
}
