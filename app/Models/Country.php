<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'countrys';
    
}
