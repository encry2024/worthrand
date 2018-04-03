<?php

namespace App\Events\Backend\Aftermarket;

use Illuminate\Queue\SerializesModels;

/**
 * Class AftermarketDeleted.
 */
class AftermarketDeleted
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
    public function __construct($doer, $aftermarket)
    {
        $this->doer         = $doer;
        $this->aftermarket  = $aftermarket;
    }
}
