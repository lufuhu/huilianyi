<?php

namespace App\Models;

class Address extends BaseModel
{
    protected $table = 'address';
    protected $fillable = [
        'user_id',
        'type',
        'remark',
        "name",
        "phone",
        "city",
        "address",
        "company"
    ];
}
