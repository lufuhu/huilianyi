<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class Ship extends BaseModel
{
    protected $table = 'ships';

    protected $fillable = [
        "name",
        "name_abbr",
        "name_en",
        "name_en_abbr",
        "sort",
        "website",
        "status",
    ];

    public static function getCacheAll(){
        $key = "ships";
        if (!Cache::has($key)) {
            $data = self::where('status', 1)->get()->toArray();
            Cache::forever($key, $data);
        }
        return Cache::get($key);
    }
}
