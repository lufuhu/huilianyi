<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class Config extends BaseModel
{
    protected $table = "configs";

    public static $EnumType = [0 => 'txt', 1 => 'json'];

	public static function getValue ($key){
	    if (!Cache::has('configs_' . $key)) {
            $config = self::where('key', $key)->first();
            $value = $config->value;
            switch ($config->type) {
                case 1;
                    $value = json_decode($value, true);
            }
            Cache::forever('configs_' . $key, $value);
        }
        return Cache::get('configs_' . $key);
    }
}
