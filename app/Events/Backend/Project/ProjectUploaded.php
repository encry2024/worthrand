<?php

namespace App\Events\Backend\Project;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProjectUploaded.
 */
class ProjectUploaded
{
    use SerializesModels;

    /**
     * @var
     */
    public $project;
    public $file_name;
    public $doer;

    /**
     * @param $project
     */
    public function __construct($doer, $file_name, $project)
    {
        $this->doer      = $doer;
        $this->file_name = $file_name;
        $this->project   = $project;
    }
}
