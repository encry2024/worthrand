<?php

namespace App\Events\Backend\Auth\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserRestored.
 */
class UserRestored
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;
    public $doer;

    /**
     * @param $user
     */
    public function __construct($user, $doer)
    {
        $this->user = $user;
        $this->doer = $doer;
    }
}
