<?php

namespace App\Models\IndentedProposal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\IndentedProposal\Traits\Relationship\IndentedProposalRelationship;
use App\Models\IndentedProposal\Traits\Attribute\IndentedProposalAttribute;

class IndentedProposal extends Model
{
    use IndentedProposalRelationship, 
        IndentedProposalAttribute,
        SoftDeletes;

    protected $fillable = [
        'customer_id',
        'user_id',
        'status',
        'collection_status',
        'purchase_order',
        'rfq_number',
        'wpc_reference',
        'invoice_to',
        'invoice_to_address',
        'ship_to',
        'ship_to_address',
        'wpcoc',
        'order_entry_no',
        'ship_via',
        'amount',
        'insurance',
        'bank_detail_name',
        'bank_detail_address',
        'bank_detail_account_no',
        'bank_detail_swift_code',
        'bank_detail_account_name',
        'terms_of_payment_1',
        'terms_of_payment_address',
        'documents',
        'special_instruction',
        'packing',
        'commission_note',
        'commission_address',
        'commission_account_number',
        'commission_swift_code',
        'file_name',
        'created_at',
        'updated_at',
        'deleted_at'                      
    ];
}
