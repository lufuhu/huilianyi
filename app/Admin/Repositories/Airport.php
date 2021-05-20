<?php

namespace App\Admin\Repositories;

use App\Models\Airport as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Airport extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
