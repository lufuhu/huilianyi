<?php

namespace App\Models;

class OrderParcel extends BaseModel
{
    protected $table = 'order_parcel';

    protected $fillable = [
        'user_id',
        'order_id',
        'title',
        'type',
        'pack_type',
        'long',
        'width',
        'height',
        'weight',
        'long_all',
        'width_all',
        'height_all',
        'weight_all',
        'num',
        'pack',
        'container',
    ];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
