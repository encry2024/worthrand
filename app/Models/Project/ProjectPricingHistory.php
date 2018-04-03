<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Project\Traits\Attribute\ProjectPricingHistoryAttribute;

class ProjectPricingHistory extends Model
{
    use SoftDeletes,
        ProjectPricingHistoryAttribute;
    //
    protected $fillable = [
        'project_id',
        'po_number',
        'pricing_date',
        'price',
        'terms',
        'delivery',
        'fpd_reference',
        'wpc_reference',
    ];
}
