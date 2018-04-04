<?php

namespace App\Models\TargetRevenue\Traits\Relationship;

use App\Models\TargetRevenue\TargetRevenueHistory;

/**
 * Trait TargetRevenueRelationship.
 */
trait TargetRevenueRelationship
{
    /**
     * @return mixed
     */
    public function target_revenue_histories()
    {
        return $this->hasMany(TargetRevenueHistory::class);
    }
}
