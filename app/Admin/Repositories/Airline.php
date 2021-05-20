<?php

namespace App\Admin\Repositories;

use App\Models\Airline as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Airline extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
