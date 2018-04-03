<?php

namespace App\Events\Backend\Project;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProjectCreated.
 */
class ProjectCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $project;
    public $doer;

    /**
     * @param $project
     */
    public function __construct($doer, $project)
    {
        $this->doer     = $doer;
        $this->project  = $project;
    }
}
