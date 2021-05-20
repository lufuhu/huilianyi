<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class FbaStorage extends BaseModel
{
    protected $table = 'fba_storage';

    protected $fillable = [
        "code",
        "address",
        "city",
        "state",
        "area",
        "country",
        "country_code",
        "status",
    ];

    public static function getCacheAll(){
        $key = "fba_storage";
        if (!Cache::has($key)) {
            $data = self::where('status', 1)->get()->toArray();
            Cache::forever($key, $data);
        }
        return Cache::get($key);
    }
}
