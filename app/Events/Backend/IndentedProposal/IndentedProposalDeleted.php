<?php

namespace App\Events\Backend\IndentedProposal;

use Illuminate\Queue\SerializesModels;

/**
 * Class IndentedProposalDeleted.
 */
class IndentedProposalDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $indented_proposal;
    public $doer;

    /**
     * @param indented_proposal
     */
    public function __construct($doer, $indented_proposal)
    {
        $this->doer               = $doer;
        $this->indented_proposal  = $indented_proposal;
    }
}
