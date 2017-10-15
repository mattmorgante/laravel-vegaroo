<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function environment() {
        return view('environment');
    }

    public function health() {
        return view('health');
    }

    public function budget() {
        return view('budget');
    }

    public function animals() {
        return view('animals');
    }
}
