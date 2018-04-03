<?php

namespace App\Events\Backend\Aftermarket;

use Illuminate\Queue\SerializesModels;

/**
 * Class AftermarketPermanentlyDeleted.
 */
class AftermarketPermanentlyDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $aftermarket;
    public $doer;

    /**
     * @param $aftermarket
     */
    public function __construct($aftermarket, $doer)
    {
        $this->aftermarket  = $aftermarket;
        $this->doer         = $doer;
    }
}
