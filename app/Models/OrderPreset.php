<?php

namespace App\Models;

class OrderPreset extends BaseModel
{
    protected $table = 'order_preset';

    protected $fillable = [
        'user_id',
        'order',
    ];

    public function getOrderAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = json_encode($value);
    }
}
