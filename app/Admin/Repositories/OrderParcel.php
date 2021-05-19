<?php

namespace App\Admin\Repositories;

use App\Models\OrderParcel as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class OrderParcel extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
