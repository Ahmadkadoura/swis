<?php

namespace App\Observers;

use App\Models\Warehouse;

class WarehouseObserver
{
    /**
     * Handle the Warehouse "created" event.
     */
    public function created(Warehouse $warehouse): void
    {
        $code = substr($warehouse->name,0,4).(2000000 + $warehouse->id);
        $warehouse->code = $code;
        $warehouse->save();
    }

}
