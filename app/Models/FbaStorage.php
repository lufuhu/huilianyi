<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class FbaStorage extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'fba_storage';
    
}
