<?php

namespace App\Http\Controllers;

use App\Foods;
use App\recipe;

class FoodsController extends Controller
{
    public function show($food = null)
    {
        $foodObject = new Foods();
        if ($food == null) {
            return view('allFoods')->with([
                'foods' => $foodObject->getAllFoods()
            ]);
        } else {
            $foodData = Foods::getAFood($food);
            return view('food-detail')->with([
                'food' => $foodData,
                'recipes' => recipe::getRecipeByTag($foodData->slug, 100)
            ]);
        }
    }
}
