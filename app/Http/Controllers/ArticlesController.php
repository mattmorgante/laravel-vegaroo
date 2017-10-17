<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function environment() {
        return view('articles/environment');
    }

    public function health() {
        return view('articles/health');
    }

    public function animals() {
        return view('articles/animals');
    }

    public function budget() {
        return view('articles/budget');
    }

    public function about() {
        return view('articles/about');
    }

    public function pantry() {
        return view('articles/pantry');
    }
}
