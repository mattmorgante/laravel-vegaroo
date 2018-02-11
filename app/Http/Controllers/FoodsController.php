<?php

namespace App\Http\Controllers;

use App\Foods;
use App\recipe;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function show($food) {
        $food = Foods::where('slug', $food)->first();

        $recipes = recipe::where('tags', 'LIKE', '%'.$food->slug.'%')->get();

        return view('foods/beans')->with([
            'food' => $food,
            'recipes' => $recipes
        ]);

        return view();
    }
}
