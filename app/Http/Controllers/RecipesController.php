<?php

namespace App\Http\Controllers;

use App\recipe;
use App\savedRecipes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    public function home()
    {
        $recipe = new recipe();
        list($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies, $sides) = $recipe::getAllCategories();

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
        if ($category == 'popular') {
          $recipes = recipe::orderBy('upvotes', 'desc')->get();
          return view('popularRecipes')->with([
              'recipes' => $recipes
          ]);
        }

        if ($slug == null) {
            $recipes = recipe::getRecipesByCategory($category);

            return view('recipeCategory')->with([
                'category' => ucwords($category),
                'recipes' => $recipes
            ]);
        } else {
            $recipe = recipe::getARecipe($slug);
            // dont cache upvotes!
            $recipe->upvotes = recipe::getUpvotes($slug);

            $saved = false;
            $userId = false;
            if (Auth::id()) {
                $userId = Auth::id();
                $savedRecipe = savedRecipes::where([
                    ['user_id', Auth::id()],
                    ['recipe_id', $recipe->id]
                    ])->first();
                $saved = is_null($savedRecipe) ? false : true;
            }

            if ($category == $recipe->category) {
                // all recipes of this category except the current one
                $similarRecipes = recipe::getRecipesByCategory($recipe->category);
                foreach ($similarRecipes as $key => $similarRecipe) {
                    if ($similarRecipe->slug == $recipe->slug) {
                        unset($similarRecipes[$key]);
                    }
                }

                $recipeClass = new recipe();
                list($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies, $sides) = $recipeClass->getAllCategories();

                $ingredients = explode(',', $recipe->ingredients);
                $instructions = explode(';', $recipe->instructions);
                $allTags = str_replace(' ', '', $recipe->tags);
                $tags = explode(',', $allTags);
                $notes = explode(';', $recipe->notes);
                $categoryName = ucwords($recipe->category);

                return view('recipe')->with([
                    'recipe' => $recipe,
                    'ingredients' => $ingredients,
                    'instructions' => $instructions,
                    'tags' => $tags,
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
                    'sides' => $sides,
                    'saved' => $saved,
                    'userId' => $userId

                ]);

            } else {
                dd('Uh Oh! Could not find that right now. We will try to fix this as soon as possible.');
            }
        }
    }

    public function upvote(Request $request) {
        $recipe = recipe::where('slug', $request->input('slug'))->first();
        $currentUpvotes = $recipe->upvotes;
        $recipe->upvotes = $currentUpvotes + 1;
        $recipe->save();
    }

    public function save(Request $request) {
        $recipe = recipe::where('slug', $request->input('slug'))->first();

        $savedRecipe = new savedRecipes();
        $savedRecipe->user_id = $request->input('userId');
        $savedRecipe->recipe_id = $recipe->id;
        $savedRecipe->save();
    }

    public function unsave(Request $request) {
        $recipe = recipe::where('slug', $request->input('slug'))->first();
        $savedRecipe = savedRecipes::where([
            ['user_id', $request->input('userId')],
            ['recipe_id', $recipe->id]
        ])->first();

        $savedRecipe->delete();
    }

    public function blueprint() {
        return view('blueprint');
    }
}
