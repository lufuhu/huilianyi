<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'from',
        'to',
        'price',
        'info_type',
        'time',
        'express_company',
        'insurance',
        'customs',
        'revenue',
        'clause',
        'remark',
        'consignee_type',
        'consignee_name',
        'consignee_tel',
        'consignee_address',
        'addresser_type',
        'addresser_date',
        'addresser_name',
        'addresser_tel',
        'addresser_address',
        'order_parcel_id',
        'forwarder_id',
        'forwarder_task_id',
        'status',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function forwarder()
    {
        return $this->hasOne('App\Models\Forwarder', 'id', 'forwarder_id');
    }

    public function forwarderTask()
    {
        return $this->hasOne('App\Models\ForwarderTask', 'id', 'forwarder_task_id');
    }

    public function orderParcels()
    {
        return $this->hasMany('App\Models\OrderParcel', 'order_id', 'id');
    }
}
