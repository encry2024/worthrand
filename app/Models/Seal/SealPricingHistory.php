<?php

namespace App\Models\Seal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Seal\Traits\Attribute\SealPricingHistoryAttribute;

class SealPricingHistory extends Model
{
    use SoftDeletes,
        SealPricingHistoryAttribute;
    //
    protected $fillable = [
        'seal_id',
        'po_number',
        'pricing_date',
        'price',
        'terms',
        'delivery',
        'fpd_reference',
        'wpc_reference',
    ];
}
