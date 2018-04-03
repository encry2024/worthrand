<?php

namespace App\Events\Backend\BuyAndResaleProposal;

use Illuminate\Queue\SerializesModels;

/**
 * Class BuyAndResaleProposalUploaded.
 */
class BuyAndResaleProposalUploaded
{
    use SerializesModels;

    /**
     * @var
     */
    public $buy_and_resale_proposal;
    public $file_name;
    public $doer;

    /**
     * @param indented_proposal
     */
    public function __construct($doer, $file_name, $buy_and_resale_proposal)
    {
        $this->doer                     = $doer;
        $this->file_name                = $file_name;
        $this->buy_and_resale_proposal  = $buy_and_resale_proposal;
    }
}
