<?php

namespace App\Models;


class Message extends BaseModel
{
    protected $table = "messages";

    protected $fillable = [
        'user_id',
        'admin_id',
        'title',
        'img',
        'content',
        'type',
        'status',
    ];

    public function getImgAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    public function setImgAttribute($value)
    {
        $this->attributes['img'] = implode(',', $value);
    }
}
