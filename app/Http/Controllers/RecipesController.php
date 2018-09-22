<?php

namespace App\Http\Controllers;

use App\Http\Helpers\RecipeHelper;
use App\recipe;

class RecipesController extends Controller
{
    public function index()
    {
        list($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies) = recipe::getAllCategories();
        return view('all-recipes')->with([
            'breakfasts' => $breakfasts,
            'salads' => $salads,
            'bowls' => $bowls,
            'curries' => $curries,
            'stirFries' => $stirFries,
            'classics' => $classics,
            'snacks' => $snacks,
            'smoothies' => $smoothies,
        ]);
    }

    public function show($category, $slug = null)
    {
        $recipeHelper = new RecipeHelper();
        if ($category == 'popular') {
            $recipes = recipe::orderBy('upvotes', 'desc')->get();
            return view('popularRecipes')->with([
                'recipes' => $recipes
            ]);
        } elseif ($slug == null) {
            return view('recipeCategory')->with([
                'category' => ucwords($category),
                'recipes' => recipe::getRecipesByCategory($category),
            ]);
        } else {
            $recipe = recipe::getARecipe($slug);
            $recipe->upvotes = recipe::getUpvotes($slug);
            $recipe = $recipeHelper->calculateMacros($recipe);
            list($saved, $userId) = $recipeHelper->getUserInfoOfARecipe($recipe);
            list($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies) = recipe::getAllCategories();
            return view('recipe')->with([
                'recipe' => $recipe,
                'ingredients' => explode(',', $recipe->ingredients),
                'instructions' => explode(';', $recipe->instructions),
                'tags' => explode(',', str_replace(' ', '', $recipe->tags)),
                'similarRecipes' => $recipeHelper->getSimilarRecipes($recipe),
                'categoryName' => $categoryName = ucwords($recipe->category),
                'userId' => $userId,
                'saved' => $saved,
                'breakfasts' => $breakfasts,
                'salads' => $salads,
                'bowls' => $bowls,
                'curries' => $curries,
                'stirFries' => $stirFries,
                'classics' => $classics,
                'snacks' => $snacks,
                'smoothies' => $smoothies
            ]);
        }
    }
}
