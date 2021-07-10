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
        "name_cn",
        "phone",
        "country",
        "country_cn",
        "country_code",
        "city",
        "city_cn",
        "address",
        "address_cn",
        "company",
        "company_cn",
        'is_default'
    ];
}
