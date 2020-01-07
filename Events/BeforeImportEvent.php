<?php

namespace Modules\Product\Events;

use Illuminate\Queue\SerializesModels;

class BeforeImportEvent
{
    use SerializesModels;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function data()
    {
        return $this->data;
    }
}
