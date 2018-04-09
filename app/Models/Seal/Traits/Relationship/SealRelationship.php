<?php

namespace App\Models\Seal\Traits\Relationship;

use App\Models\IndentedProposal\IndentedProposalItem;
use App\Models\BuyAndResaleProposal\BuyAndResaleProposalItem;
use App\Models\PricingHistory\PricingHistory;

/**
 * Trait SealRelationship.
 */
trait SealRelationship
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
        return $this->morphMany(PricingHistory::class, 'pricing_historable');
    }

    // /**
    //  * @return mixed
    //  */
    // public function pricing_histories()
    // {
    //     return $this->hasMany(SealPricingHistory::class);
    // }

    /**
     * @return mixed
     */
    public function latest_pricing_histories()
    {
        return $this->hasMany(SealPricingHistory::class)->orderBy('created_at', 'desc')->take(5);
    }

    /**
     * @return mixed
     */
    public function latest_price()
    {
        return $this->hasOne(SealPricingHistory::class)->orderBy('created_at', 'desc')->latest();
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
