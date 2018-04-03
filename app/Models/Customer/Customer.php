<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer\Traits\Attribute\CustomerAttribute;
use App\Models\Customer\Traits\Relationship\CustomerRelationship;

class Customer extends Model
{
    // Traits
    use SoftDeletes,
        CustomerAttribute,
        CustomerRelationship;

    protected $fillable = [
        'name',
        'city',
        'address',
        'postal_code',
        'plant_site_address',
        'contact_person',
        'contact_number',
        'position_of_contact_person'
    ];
}
