<?php

namespace App\Observers;

use App\Models\Item;

class ItemObserver
{
    /**
     * Handle the Item "created" event.
     */
    public function created(Item $item): void
    {
        $code = substr($item->name,0,4).(4000000 + $item->id);
        $item->code = $code;
        $item->save();
    }
}
