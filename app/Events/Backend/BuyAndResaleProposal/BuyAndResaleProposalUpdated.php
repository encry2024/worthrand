<?php

namespace App\Events\Backend\BuyAndResaleProposal;

use Illuminate\Queue\SerializesModels;

/**
 * Class BuyAndResaleProposalUpdated.
 */
class BuyAndResaleProposalUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $buy_and_resale_proposal;
    public $doer;

    /**
     * @param indented_proposal
     */
    public function __construct($doer, $buy_and_resale_proposal)
    {
        $this->doer                     = $doer;
        $this->buy_and_resale_proposal  = $buy_and_resale_proposal;
    }
}
