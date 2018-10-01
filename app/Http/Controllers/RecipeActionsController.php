<?php

namespace App\Http\Controllers;

use App\recipe;
use App\savedRecipes;
use Illuminate\Http\Request;

class RecipeActionsController extends Controller
{
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
}