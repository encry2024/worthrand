<?php

namespace App\Events\Backend\Auth\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserCreated.
 */
class UserCreated
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
    public function __construct($doer, $user)
    {
        $this->doer = $doer;
        $this->user = $user;
    }
}
