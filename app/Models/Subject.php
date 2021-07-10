<?php


namespace App\Models;


class Subject extends BaseModel
{
    protected $table = 'subjects';

    protected $fillable = [
        "user_id",
        "type",
        "name",
        "number",
        "tel",
        "img",
        "auth_pid",
        "auth_img",
        "auth_type",
        "status",
    ];
}
