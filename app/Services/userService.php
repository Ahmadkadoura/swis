<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class userService extends baseServics
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }


}
