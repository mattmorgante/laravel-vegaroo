<?php

namespace App\Http\Controllers;

use App\recipe;
use Illuminate\Http\Request;

class recipes_controller extends Controller
{
    public function index()
    {
        $breakfasts = recipe::where('category', 'breakfast')->get();
        $salads = recipe::where('category', 'salads')->get();
        $bowls = recipe::where('category', 'bowls')->get();
        $curry = recipe::where('category', 'curry')->get();
        $stirFry = recipe::where('category', 'stir-fry')->get();
        $classics = recipe::where('category', 'classics')->get();
        $snacks = recipe::where('category', 'snacks')->get();
        $smoothies = recipe::where('category', 'smoothies')->get();

        return view('home')->with([
            'breakfasts' => $breakfasts,
            'salads' => $salads,
            'bowls' => $bowls,
            'curry' => $curry,
            'stirFry' => $stirFry,
            'classics' => $classics,
            'snacks' => $snacks,
            'smoothies' => $smoothies
        ]);
    }

    public function show($slug)
    {
        $recipe = recipe::where('slug', '=', $slug)->first();

        $ingredients = explode(',', $recipe->ingredients);
        $instructions = explode(';', $recipe->instructions);

        return view('recipe')->with([
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'instructions' => $instructions
        ]);
    }
}