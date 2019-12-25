 
<?php

namespace Modules\Product\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Product\Events\ProductRequestRulesEvent;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ProductRequestRulesEvent::class => []
    ];
}