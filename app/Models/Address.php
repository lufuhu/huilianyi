<?php

namespace App\Models;

class Address extends BaseModel
{
    protected $table = 'address';
    protected $fillable = [
        'user_id',
        "name",
        "phone",
        "address"
    ];
}
