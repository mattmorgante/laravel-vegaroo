<?php

namespace App\Http\Controllers;

use App\Foods;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function show($food) {
        $food = Foods::where('slug', $food)->first();
        return view('foods/' . $food->slug);
    }
}
