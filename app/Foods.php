<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Foods extends Model
{
    protected $table = 'foods';
    const DEFAULT_CACHE_TIME = 1440;

    public static function getAFood($slug){
        $key = md5('1food'.$slug);
        if (Cache::has( $key )) {
            $response = Cache::get( $key );
        } else {
            $response = Foods::where('slug', $slug)->first();
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;
    }

    public static function getAllFoods(){
        $key = md5('foods');
        if (Cache::has( $key )) {
            $response = Cache::get( $key );
        } else {
            $response = Foods::all();
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;
    }

    public static function getAttributeOfFoods($attribute) {
        $key = md5('attribute'.$attribute);
        if (Cache::has( $key )) {
            $response = Cache::get( $key );
        } else {
            $response = Foods::all()->pluck($attribute);
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;

    }
}

