<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $code = substr($user->name,0,4).(1000000 + $user->id);
        $user->code = $code;
        $user->save();
    }

}
