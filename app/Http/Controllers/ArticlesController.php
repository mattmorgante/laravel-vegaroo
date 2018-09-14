<?php

namespace App\Http\Controllers;


class ArticlesController extends Controller
{

    public function environment() {
        return view('articles/environment');
    }

    public function index() {
        return view('articles/index');
    }

    public function healthLongTerm() {
        return view('articles/health-long-term');
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

    public function nutrition() {
        return view('articles/nutrition');
    }

    public function smallSteps() {
        return view('articles/small-steps');
    }
    public function blogs() {
        return view('articles/blogs');
    }
}
