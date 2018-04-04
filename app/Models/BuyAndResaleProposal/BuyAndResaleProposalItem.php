<?php

namespace App\Models\BuyAndResaleProposal;

use Illuminate\Database\Eloquent\Model;
use App\Models\BuyAndResaleProposal\Traits\Relationship\BuyAndResaleProposalItemRelationship;

class BuyAndResaleProposalItem extends Model
{
    //
    use BuyAndResaleProposalItemRelationship;

    protected $fillable = [
        'status'
    ];
}
