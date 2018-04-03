<?php

namespace App\Events\Backend\Aftermarket;

use Illuminate\Queue\SerializesModels;

/**
 * Class AftermarketUploaded.
 */
class AftermarketUploaded
{
    use SerializesModels;

    /**
     * @var
     */
    public $aftermarket;
    public $file_name;
    public $doer;

    /**
     * @param $aftermarket
     */
    public function __construct($doer, $file_name, $aftermarket)
    {
        $this->doer         = $doer;
        $this->file_name    = $file_name;
        $this->aftermarket  = $aftermarket;
    }
}
