<?php

namespace App\Models;

class ForwarderTask extends BaseModel
{
    protected $table = 'forwarder_task';

    protected $fillable = [
        'user_id',
        'forwarder_id',
        'title',
        'from',
        'to',
        'transportation',
        'min_time',
        'max_time',
        'guarantee',
        'cargo',
        'base_price',
        'base_weight',
        'price',
    ];

    public static $EnumTransportation = [
        1 => '快递', 2 => '空运', 3=>'海运',4=>'陆运'
    ];

    public function forwarder()
    {
        return $this->hasOne('App\Models\Forwarder', 'id', 'forwarder_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function getGuaranteeAttribute($value)
    {
        return explode(',', $value);
    }

    public function setGuaranteeAttribute($value)
    {
        $this->attributes['guarantee'] = implode(',', $value);
    }
    public function getCargoAttribute($value)
    {
        return explode(',', $value);
    }

    public function setCargoAttribute($value)
    {
        $this->attributes['cargo'] = implode(',', $value);
    }

}
