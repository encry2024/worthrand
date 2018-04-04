<?php

namespace App\Models\IndentedProposal;

use Illuminate\Database\Eloquent\Model;
use App\Models\IndentedProposal\Traits\Relationship\IndentedProposalItemRelationship;

class IndentedProposalItem extends Model
{
    //
    use IndentedProposalItemRelationship;

    protected $fillable = [
        'status'
    ];
}
