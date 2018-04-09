<?php

namespace App\Models\PricingHistory\Traits\Relationship;

/**
 * Class PricingHistoryRelationship.
 */
trait PricingHistoryRelationship
{
    /**
     * @return mixed
     */
    public function pricing_historable()
    {
        return $this->morphTo();
    }
}
