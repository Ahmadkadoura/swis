<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\User;

class userService extends baseServics
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }


}
