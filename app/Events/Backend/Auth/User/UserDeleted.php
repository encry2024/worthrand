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
