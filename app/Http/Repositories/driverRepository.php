<?php

namespace App\Http\Repositories;

use App\Models\Driver;

class driverRepository extends baseRepository
{
    public function __construct(Driver $model)
    {
        parent::__construct($model);
    }
}
