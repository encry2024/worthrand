<?php

namespace App\Events\Backend\Customer;

use Illuminate\Queue\SerializesModels;

/**
 * Class CustomerRestored.
 */
class CustomerRestored
{
    use SerializesModels;

    /**
     * @var
     */
    public $customer;
    public $doer;

    /**
     * @param $customer
     */
    public function __construct($doer, $customer)
    {
        $this->doer      = $doer;
        $this->customer  = $customer;
    }
}
