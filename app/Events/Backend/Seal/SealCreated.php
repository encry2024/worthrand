<?php

namespace App\Events\Backend\Seal;

use Illuminate\Queue\SerializesModels;

/**
 * Class SealCreated.
 */
class SealCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $seal;
    public $doer;

    /**
     * @param $seal
     */
    public function __construct($doer, $seal)
    {
        $this->doer  = $doer;
        $this->seal  = $seal;
    }
}
