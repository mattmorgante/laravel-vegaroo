<?php

namespace App\Http\Controllers;

use App\Foods;
use App\recipe;

class FoodsController extends Controller
{
    public function show($food = null)
    {
        if ($food == null) {
            return view('allFoods')->with([
                'foods' => Foods::getAllFoods()
            ]);
        } else {
            $foodObject = Foods::getAFood($food);
            return view('foods/beans')->with([
                'food' => $foodObject,
                'recipes' => recipe::getRecipeByTag($foodObject->slug, 100)
            ]);
        }
    }
}
