<?php

namespace App\Models\TargetRevenue;

use Illuminate\Database\Eloquent\Model;
use App\Models\TargetRevenue\Traits\Relationship\TargetRevenueRelationship;

class TargetRevenue extends Model
{
    //
    use TargetRevenueRelationship;
}
