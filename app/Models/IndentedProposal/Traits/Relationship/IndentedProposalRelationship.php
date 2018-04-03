<?php

namespace App\Models\IndentedProposal\Traits\Relationship;

use App\Models\Customer\Customer;
use App\Models\IndentedProposal\IndentedProposalItem;

/**
 * Trait IndentedProposalRelationship.
 */
trait IndentedProposalRelationship
{
    /**
     * @return mixed
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return mixed
     */
    public function indented_proposal_items()
    {
        return $this->hasMany(IndentedProposalItem::class);
    }
}
