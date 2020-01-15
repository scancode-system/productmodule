<?php

namespace Modules\Product\Events;

use Illuminate\Queue\SerializesModels;

class ProductFamilyAliasEvent
{
    use SerializesModels;

    private $product;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->product = $product;
    }


    public function product(){
        return $this->product;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
