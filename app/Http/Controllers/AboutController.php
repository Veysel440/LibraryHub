<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutUs = About::first();
        $images = json_decode($aboutUs->images);

        if ($images === null) {
            $images = [];
        }
        return view('about.index', compact('aboutUs','images'));
    }
}


