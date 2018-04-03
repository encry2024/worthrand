<?php

namespace App\Events\Backend\IndentedProposal;

use Illuminate\Queue\SerializesModels;

/**
 * Class IndentedProposalUploaded.
 */
class IndentedProposalUploaded
{
    use SerializesModels;

    /**
     * @var
     */
    public $indented_proposal;
    public $file_name;
    public $doer;

    /**
     * @param indented_proposal
     */
    public function __construct($doer, $file_name, $indented_proposal)
    {
        $this->doer               = $doer;
        $this->file_name          = $file_name;
        $this->indented_proposal  = $indented_proposal;
    }
}
