<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;

class BlueprintController extends Controller
{
    public function index() { 
        $ingredients = Ingredient::get();
        foreach ($ingredients as $ingredient) {
            switch ($ingredient->category) {
                case 'Greens';
                    $greens[] = $ingredient;
                    break;
                case 'Grains';
                    $grains[] = $ingredient;
                    break;
                case 'Beans';
                    $beans[] = $ingredient;
                    break;
                case 'Vegetables';
                    $vegetables[] = $ingredient;
                    break;
                case 'Fruit';
                    $fruits[] = $ingredient;
                    break;
                case 'Topping';
                    $toppings[] = $ingredient;
            }
        }

        return view('blueprint')->with([
            'greens' => $greens,
            'grains' => $grains,
            'beans' => $beans,
            'vegetables' => $vegetables,
            'fruits' => $fruits,
            'toppings' => $toppings
        ]);


    }
}
