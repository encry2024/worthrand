<?php

namespace App\Events\Backend\PricingHistory;

use Illuminate\Queue\SerializesModels;

/**
 * Class GeneralPricingHistoryDeleted.
 */
class GeneralPricingHistoryDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $doer;
    public $type;
    public $reference;
    public $object;

    /**
     * @param $doer
     * @param $type
     */
    public function __construct($doer, $type, $reference, $object)
    {
        $this->doer      = $doer;
        $this->type      = $type;
        $this->reference = $reference;
        $this->object    = $object;
    }
}
