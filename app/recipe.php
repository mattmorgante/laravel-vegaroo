<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    protected $table = 'recipe';

    public static function getAllCategories()
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
