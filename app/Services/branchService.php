<?php

namespace App\Services;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;

class branchService extends baseServics
{
    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }
}
