<?php

namespace App\Models\BuyAndResaleProposal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BuyAndResaleProposal\Traits\Attribute\BuyAndResaleProposalAttribute;
use App\Models\BuyAndResaleProposal\Traits\Relationship\BuyAndResaleProposalRelationship;

class BuyAndResaleProposal extends Model
{
    //
    use BuyAndResaleProposalAttribute,
        BuyAndResaleProposalRelationship,
        SoftDeletes;

    protected $fillable = [
        'customer_id',
        'user_id',
        'invoice_to',
        'date',
        'invoice_address',
        'qrc_reference',
        'wpc_reference',
        'validity',
        'payment_terms',
        'purchase_order',
        'status',
        'collection_status',
        'file_name'
    ];
}
