<?php

namespace App\Models\Aftermarket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Aftermarket\Traits\Attribute\AftermarketAttribute;
use App\Models\Aftermarket\Traits\Relationship\AftermarketRelationship;

class Aftermarket extends Model
{
    use SoftDeletes,
        AftermarketAttribute,
        AftermarketRelationship;

    protected $fillable = [
        'name',
        'model',
        'part_number',
        'reference_number',
        'material_number',
        'serial_number',
        'tag_number',
        'ccn_number',
        'price',
        'company_name',
        'scanned_file',
        'description',
        'stock_number',
        'sap_number'
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
