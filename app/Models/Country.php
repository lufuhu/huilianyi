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
            $list = self::where('status', 1)->select('name','code','letter')->get();
            $data = [];
            $letter = [];
            foreach ($list as $item) {
                $data[$item->letter]['letter'] = $item->letter;
                $data[$item->letter]['data'][] = $item;
                $letter[] = $item->letter;
            }
            $letter = array_unique($letter);
            $list = compact('letter', 'data');
            Cache::forever($key, $list);
        }
        return Cache::get($key);
    }
}
