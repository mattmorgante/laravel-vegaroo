<?php

namespace App\Http\Controllers;

use App\Foods;
use App\recipe;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function show($food)
    {
        $food = Foods::getAFood($food);

        $recipes = recipe::getRecipeByTag($food->slug, 100);

        return view('foods/beans')->with([
            'food' => $food,
            'recipes' => $recipes
        ]);
    }
}
