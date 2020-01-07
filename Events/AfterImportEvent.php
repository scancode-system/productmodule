<?php

namespace Modules\Product\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Product\Entities\Product;

class AfterImportEvent
{
    use SerializesModels;

    private $data;
    private $product;

    public function __construct(Product $product, $data)
    {
        $this->product = $product;
        $this->data = $data;
    }

    public function product()
    {
        return $this->product;
    }

    public function data()
    {
        return $this->data;
    }
}
