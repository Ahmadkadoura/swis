<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use App\Models\Branch;
use App\Models\Item;
use App\Models\User;
use App\Models\Warehouse;
use App\Observers\BranchObserver;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use App\Observers\WarehouseObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // if (!app()->isProduction()) {
        //     Model::shouldBeStrict();
        // }
        Schema::defaultStringLength(191);
        User::observe(UserObserver::class);
        Warehouse::observe(WarehouseObserver::class);
        Branch::observe(BranchObserver::class);
        Item::observe(ItemObserver::class);
    }
}
