<?php

namespace App\Models\Aftermarket\Traits\Relationship;

use App\Models\Aftermarket\AftermarketPricingHistory;
use App\Models\IndentedProposal\IndentedProposalItem;
use App\Models\BuyAndResaleProposal\BuyAndResaleProposalItem;
/**
 * Trait AftermarketRelationship.
 */
trait AftermarketRelationship
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
    public function pricing_histories()
    {
        return $this->hasMany(AftermarketPricingHistory::class);
    }

    /**
     * @return mixed
     */
    public function latest_pricing_histories()
    {
        return $this->hasMany(AftermarketPricingHistory::class)->orderBy('pricing_date', 'desc')->take(5);
    }

    /**
     * @return mixed
     */
    public function latest_price()
    {
        return $this->hasOne(AftermarketPricingHistory::class)->orderBy('created_at', 'desc')->latest();
    }

    /**
     * @return mixed
     */
    public function indented_proposal_items()
    {
        return $this->morphMany(IndentedProposalItem::class, 'indented_proposal_itemmable');
    }

    /**
     * @return mixed
     */
    public function buy_and_resale_proposal_items()
    {
        return $this->morphMany(BuyAndResaleProposalItem::class, 'buy_and_resale_proposal_itemmable');
    }
}
