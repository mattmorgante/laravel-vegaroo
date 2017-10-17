<?php

namespace App\Http\Controllers;

use App\recipe;
use Illuminate\Http\Request;

class recipes_controller extends Controller
{
    public function index()
    {
        return recipe::all();
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