<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	use HasDateTimeFormatter;

    public function getImgAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    public function setImgAttribute($value)
    {
        $this->attributes['img'] = implode(',', $value);
    }
}
