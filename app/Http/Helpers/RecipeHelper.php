<?php

namespace App\Http\Helpers;

use App\recipe;
use App\savedRecipes;
use Illuminate\Support\Facades\Auth;

class RecipeHelper {
    public function getSimilarRecipes($recipe) {
        $similarRecipes = recipe::getRecipesByCategory($recipe->category);
        foreach ($similarRecipes as $key => $value) {
            // all recipes of this category except the current one
            if ($value->slug == $recipe->slug) {
                unset($similarRecipes[$key]);
            }
        }
        return $similarRecipes;
    }

    public function getUserInfoOfARecipe($recipe) {
        $saved = false;
        $userId = false;
        if (Auth::id()) {
            $userId = Auth::id();
            $savedRecipe = savedRecipes::where([
                ['user_id', Auth::id()],
                ['recipe_id', $recipe->id]
            ])->first();
            $saved = $this->isSaved($savedRecipe);
        }
        return array($saved, $userId);
    }

    private function isSaved($savedRecipe) {
        return !(is_null($savedRecipe));
    }

    public function calculateMacros($recipe) {
        $recipe->carbsPercent = 100 * round($recipe->carbs / 280 , 3);
        $recipe->proteinPercent = 100 * round($recipe->protein / 52 , 3);
        $recipe->fatPercent = 100 * round($recipe->fat / 82 , 3);
        return $recipe;
    }
}