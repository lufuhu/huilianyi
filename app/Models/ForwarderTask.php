<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ForwarderTask extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'forwarder_task';
    
}
