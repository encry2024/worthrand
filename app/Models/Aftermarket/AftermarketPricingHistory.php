<?php

namespace App\Models\Aftermarket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Aftermarket\Traits\Attribute\AftermarketPricingHistoryAttribute;

class AftermarketPricingHistory extends Model
{
    use SoftDeletes,
        AftermarketPricingHistoryAttribute;
    //
    protected $fillable = [
        'aftermarket_id',
        'po_number',
        'pricing_date',
        'price',
        'terms',
        'delivery',
        'fpd_reference',
        'wpc_reference',
    ];
}
