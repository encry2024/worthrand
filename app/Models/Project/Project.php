<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Project\Traits\Attribute\ProjectAttribute;
use App\Models\Project\Traits\Relationship\ProjectRelationship;

class Project extends Model
{
    use SoftDeletes,
        ProjectAttribute,
        ProjectRelationship;

    protected $fillable = [
        'customer_id',
        'name',
        'source',
        'address_1',
        'contact_person_1',
        'contact_number_1',
        'email_1',
        'consultant',
        'address_2',
        'contact_person_2',
        'contact_number_2',
        'email_2',
        'shorted_list_epc',
        'address_3',
        'contact_person_3',
        'contact_number_3',
        'email_3',
        'approved_vendors_list',
        'requirements_coor',
        'requirements_coor',
        'epc_award',
        'award_date',
        'implementation_date',
        'execution_date',
        'bu',
        'bu_reference',
        'wpc_reference',
        'affinity_reference',
        'value',
        'reference_number',
        'types_of_sales',
        'tag_number',
        'application',
        'pump_model',
        'serial_number',
        'competitors',
        'final_result',
        'status',
        'scanned_file'
    ];

    protected $appends = [
        'data_1',
        'data_2',
        'data_3',
        'data_4',
        'data_5',
        'data_6', 
        'data_7',
        'data_model',
        'model_files'
    ];
}
