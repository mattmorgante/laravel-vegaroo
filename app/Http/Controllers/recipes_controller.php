<?php

namespace App\Http\Controllers;

use App\recipe;
use Illuminate\Http\Request;

class recipes_controller extends Controller
{
    public function index()
    {
        list($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies, $sides) = $this->getAllCategories();

        return view('allrecipes')->with([
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

    public function home()
    {
        list($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies, $sides) = $this->getAllCategories();

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

    public function show($category, $slug = null)
    {
        if ($slug == null) {
            $recipes = recipe::where('category', $category)->get();

            return view('recipeCategory')->with([
                'category' => ucwords($category),
                'recipes' => $recipes
            ]);
        } else {
            $recipe = recipe::where('slug', '=', $slug)->first();
            $categoryDb = $recipe->category;

            if ($category == $categoryDb) {
                // all recipes of this category except the current one
                $similarRecipes = recipe::where('category', $recipe->category)->get();
                foreach ($similarRecipes as $key => $similarRecipe) {
                    if ($similarRecipe->slug == $recipe->slug) {
                        unset($similarRecipes[$key]);
                    }
                }
                list($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies, $sides) = $this->getAllCategories();

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
                    'categoryName' => $categoryName,
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

            } else {
                dd('Uh Oh! Could not find that right now. We will try to fix this as soon as possible.');
            }
        }
    }

    public function blueprint() {
        return view('blueprint');
    }

    private function showCategoryPage($category) {

    }

    /**
     * @return array
     */
    private function getAllCategories()
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
        return array($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies, $sides);
    }
}