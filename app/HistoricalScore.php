<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HistoricalScore extends Model
{
    protected $table = 'historical_scores';
    const DEFAULT_CACHE_TIME = 1440;

    public static function getScoresOfAUser($userId){
        $key = md5('score'.$userId);
        if (Cache::has( $key )) {
            $response = Cache::get( $key );
        } else {
            $response = HistoricalScore::where('user_id', $userId)->get();
            Cache::put( $key, $response, self::DEFAULT_CACHE_TIME );
        }
        return $response;
    }
}
