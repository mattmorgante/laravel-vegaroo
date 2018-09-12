<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class savedRecipes extends Model
{
    protected $table = 'saved_recipes';

    public static function getSavedRecipesOfAUser($userId) {
        $savedRecipes = savedRecipes::where('user_id', $userId)->get();
        $recipes =[];
        foreach ($savedRecipes as $row) {
            $recipe = recipe::where('id', $row->recipe_id)->first();
            $recipes[] = $recipe;
        }
        return $recipes;
    }
}
