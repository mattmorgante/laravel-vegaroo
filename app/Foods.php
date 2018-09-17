<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Foods extends Model
{
    protected $table = 'foods';
    const DEFAULT_CACHE_TIME = 1440;

    public static function getAFood($slug){
        $key = md5('food'.$slug);
        if (Cache::has( $key )) {
            $response = Cache::get( $key );
        } else {
            $response = Foods::where('slug', $slug)->first();
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;
    }

    public function getAllFoods(){
        $key = md5('foods');
        return $this->getCachedData($key);
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

    private function getCachedData($key) {
        if (Cache::has( $key)) {
            $response = Cache::get( $key );
        } else {
            $response = Foods::all();
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;

    }
}

