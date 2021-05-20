<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class Airport extends BaseModel
{
    protected $table = "airports";

    protected $fillable = [
        "name",
        "code",
        "name_en",
        "country",
        "country_code",
        "code_four",
        "city",
        "status",
    ];

    public static function getCacheAll(){
        $key = "airports";
        if (!Cache::has($key)) {
            $data = self::where('status', 1)->get()->toArray();
            Cache::forever($key, $data);
        }
        return Cache::get($key);
    }
}
