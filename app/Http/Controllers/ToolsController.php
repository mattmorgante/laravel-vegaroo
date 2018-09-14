<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function tools() {
        return view('tools');
    }

    public function calculator() {
        return view('calculator');
    }
}
