<?php

namespace App\Models\BuyAndResaleProposal\Traits\Relationship;

/**
 * Class BuyAndResaleProposalItemRelationship.
 */
trait BuyAndResaleProposalItemRelationship
{
    /**
     * @return mixed
     */
    public function buy_and_resale_proposal_itemmable()
    {
        return $this->morphTo();
    }
}
