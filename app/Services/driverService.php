<?php

namespace App\Services;

use App\Models\Driver;

class driverService extends baseServics
{
    public function __construct(Driver $model)
    {
        parent::__construct($model);
    }
}
