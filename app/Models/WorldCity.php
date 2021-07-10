<?php

namespace App\Models;

class WorldCity extends BaseModel
{
    protected $table = "world_city";
    protected $fillable = [
        "pid",
        "name_zh",
        "name_en",
        "code",
        "code_all",
    ];
}

