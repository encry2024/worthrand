<?php

namespace App\Events\Backend\Auth\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserDeleted.
 */
class UserDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $doer;
    public $user;

    /**
     * @param $user
     */
    public function __construct($doer, $user)
    {
        $this->doer = $doer;
        $this->user = $user;
    }
}
