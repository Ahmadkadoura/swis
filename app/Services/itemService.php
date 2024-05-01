<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class itemService extends baseServics
{
    public function __construct(Item $model)
    {
        parent::__construct($model);
    }
}
