<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class Country extends BaseModel
{

    protected $table = 'countrys';

    protected $fillable = [
        'id',
        'name',
        'code',
        'name_en',
        'code_three',
        'code_num',
        'name_full',
        'letter',
        'status',
    ];

    public static function getCacheAll()
    {
        $key = "countrys";
        if (!Cache::has($key)) {
            $data = self::where('status', 1)->get();
            $list = [];
            foreach ($data as $item) {
                $list[] = ['letter' => $item->letter, 'data' => $item];
            }
            Cache::forever($key, $list);
        }
        return Cache::get($key);
    }
}
