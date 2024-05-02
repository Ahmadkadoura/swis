<?php

namespace App\Services;

use App\Models\Warehouse;

class warehouseService extends baseServics
{
    public function __construct(Warehouse $model)
    {
        parent::__construct($model);
    }
}