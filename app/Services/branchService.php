<?php

namespace App\Services;

use App\Models\Branch;

class branchService extends baseServics
{
    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }
}