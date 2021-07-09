<?php

namespace App\Models;

class Area extends BaseModel
{
    protected $table = "areas";
    protected $fillable = [
        "id",
        "name",
        "parentid",
        "parentname",
        "districtcode",
        "areacode",
        "zipcode",
        "population",
        "totalarea",
        "totalarea",
        "depth",
    ];
}

