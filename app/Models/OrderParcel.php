<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class OrderParcel extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'order_parcel';
    
}
