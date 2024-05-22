<?php

namespace App\Observers;

use App\Models\Branch;

class BranchObserver
{
    /**
     * Handle the Branch "created" event.
     */
    public function created(Branch $branch): void
    {
        $code = substr($branch->name,0,4).(3000000 + $branch->id);
        $branch->code = $code;
        $branch->save();
    }

}
