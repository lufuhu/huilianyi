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
        "name_en",
        "phone",
        "country",
        "country_en",
        "country_code",
        "city",
        "city_en",
        "address",
        "address_en",
        "company",
        "company_en",
        'is_default'
    ];
}
