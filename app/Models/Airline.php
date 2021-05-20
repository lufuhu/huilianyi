<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class Airline extends BaseModel
{
    protected $table = 'airlines';

    protected $fillable = [
        "name",
        "name_en",
        "code",
        "code_three",
        "waybill",
        "type",
        "status",
    ];

    public static function getCacheAll(){
        $key = "airlines";
        if (!Cache::has($key)) {
            $data = self::where('status', 1)->get()->toArray();
            Cache::forever($key, $data);
        }
        return Cache::get($key);
    }
}
