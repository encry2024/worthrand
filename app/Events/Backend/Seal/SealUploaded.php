<?php

namespace App\Events\Backend\Seal;

use Illuminate\Queue\SerializesModels;

/**
 * Class SealUploaded.
 */
class SealUploaded
{
    use SerializesModels;

    /**
     * @var
     */
    public $seal;
    public $file_name;
    public $doer;

    /**
     * @param $seal
     */
    public function __construct($doer, $file_name ,$seal)
    {
        $this->doer         = $doer;
        $this->file_name    = $file_name;
        $this->seal         = $seal;
    }
}
