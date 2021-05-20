<?php

namespace App\Models;


class Forwarder extends BaseModel
{
    protected $table = 'forwarders';

    protected $fillable = [
        'user_id',
        'monthly',
        'guarantee',
        'cargo',
        'level',
        'sort',
        'status',
    ];

    public static $EnumMonthly = [
        0 => '否', 1 => '是'
    ];
    public static $EnumStatus = [
        0 => '审核中', 1 => '正常', 2 => '禁止接单'
    ];

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
