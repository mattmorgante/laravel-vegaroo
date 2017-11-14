<?php

namespace App\Http\Controllers;

use App\recipe;
use Illuminate\Http\Request;

class recipes_controller extends Controller
{
    public function index()
    {
        $recipes = recipe::get();
        return view('allrecipes')->with([
            'recipes' => $recipes
        ]);
    }

    public function home()
    {
        $breakfasts = recipe::where('category', 'breakfasts')->get();
        $salads = recipe::where('category', 'salads')->get();
        $bowls = recipe::where('category', 'bowls')->get();
        $curries = recipe::where('category', 'curries')->get();
        $stirFries = recipe::where('category', 'stir-fries')->get();
        $classics = recipe::where('category', 'classics')->get();
        $snacks = recipe::where('category', 'snacks')->get();
        $smoothies = recipe::where('category', 'smoothies')->get();
        $sides = recipe::where('category', 'sides')->get();

        return view('home')->with([
            'breakfasts' => $breakfasts,
            'salads' => $salads,
            'bowls' => $bowls,
            'curries' => $curries,
            'stirFries' => $stirFries,
            'classics' => $classics,
            'snacks' => $snacks,
            'smoothies' => $smoothies,
            'sides' => $sides
        ]);
    }

    public function show($slug)
    {
        $recipe = recipe::where('slug', '=', $slug)->first();

        // all recipes of this category except the current one
        $similarRecipes = recipe::where('category', $recipe->category)->get();
        foreach ($similarRecipes as $key => $similarRecipe) {
            if ($similarRecipe->slug == $recipe->slug) {
                unset($similarRecipes[$key]);
            }
        }

        $ingredients = explode(',', $recipe->ingredients);
        $instructions = explode(';', $recipe->instructions);
        $notes = explode(';', $recipe->notes);
        $categoryName = ucwords($recipe->category);

        return view('recipe')->with([
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'instructions' => $instructions,
            'notes' => $notes,
            'similarRecipes' => $similarRecipes,
            'categoryName' => $categoryName
        ]);
    }
}