<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * @param string $key
     * @param string $value
     * @return array [$key => $value]
     */
    public static function getPluckList($key = 'id', $value = 'title')
    {
        return self::pluck($value, $value)->toArray();
    }
}
