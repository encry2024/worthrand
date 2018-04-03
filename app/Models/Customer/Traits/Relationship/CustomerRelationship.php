<?php

namespace App\Models\Customer\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Project\Project;
use App\Models\IndentedProposal\IndentedProposal;
use App\Models\BuyAndResaleProposal\BuyAndResaleProposal;

/**
 * Trait CustomerRelationship.
 */
trait CustomerRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * @return mixed
     */
    public function indented_proposals()
    {
        return $this->hasMany(IndentedProposal::class);
    }

    /**
     * @return mixed
     */
    public function buy_and_resale_proposals()
    {
        return $this->hasMany(BuyAndResaleProposal::class);
    }
}
