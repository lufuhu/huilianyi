<?php


namespace App\Models;


use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BaseModel extends Model
{
    use HasDateTimeFormatter;

    /**
     * @param string $key
     * @param string $value
     * @return array [$key => $value]
     */
    public static function getPluckList($key = 'id', $value = 'title')
    {
        return self::pluck($value, $key)->toArray();
    }
}
