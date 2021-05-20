<?php

namespace App\Models;


use Illuminate\Support\Facades\Cache;

class Harbour extends BaseModel
{
    protected $table = "harbours";

    protected $fillable = [
        'name',
        'code',
        'name_en',
        'country',
        'country_code',
        'line',
        'status',
    ];

    public static function getCacheAll(){
        $key = "harbours";
        if (!Cache::has($key)) {
            $data = self::where('status', 1)->get()->toArray();
            Cache::forever($key, $data);
        }
        return Cache::get($key);
    }
}
