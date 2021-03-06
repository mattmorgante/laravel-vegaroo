<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class recipe extends Model
{
    protected $table = 'recipe';
    const DEFAULT_CACHE_TIME = 1440;

    public static function getAllCategories()
    {
        $breakfasts = recipe::getRecipesByCategory('breakfasts');
        $salads = recipe::getRecipesByCategory('salads');
        $bowls = recipe::getRecipesByCategory('bowls');
        $curries = recipe::getRecipesByCategory('curries');
        $stirFries = recipe::getRecipesByCategory('stir-fries');
        $classics = recipe::getRecipesByCategory('classics');
        $snacks = recipe::getRecipesByCategory('snacks');
        $smoothies = recipe::getRecipesByCategory('smoothies');
        return array($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies);
    }

    public static function getRecipeByTag($tag, $limit = 4) {
        $key = md5('recipe-tag-'.$tag);
        if (Cache::has( $key )) {
            $response = Cache::get( $key );
        } else {
            $response = recipe::where('tags', 'LIKE', '%'.$tag.'%')->limit($limit)->get();
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;
    }

    public static function getRecipesByCategory($category) {
        $key = md5('recipe-category'.$category);
        if (Cache::has( $key )) {
            $response = Cache::get( $key );
        } else {
            $response = recipe::where('category', $category)->get();
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;
    }

    public static function getARecipe($slug) {
        $key = md5('one-recipe'.$slug);
        if (Cache::has( $key )) {
            $response = Cache::get( $key );
        } else {
            $response = recipe::where('slug', $slug)->first();
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;
    }

    public static function getUpvotes($slug) {
        return recipe::where('slug', $slug)->pluck('upvotes')[0];
    }

    public static function getRecommendedRecipes($week) {
        asort($week);
        $recommendedRecipes = [];
        foreach ($week as $food => $value) {
            if ($value < 90) {
                $slug = Foods::where('name', $food)->pluck('slug')[0];
                $recipes = recipe::getRecipeByTag($slug, 4);
                $recommendedRecipes[$food] = $recipes;
            }
        }
        return $recommendedRecipes;
    }

}
