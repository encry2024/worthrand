<?php

namespace App\Models\Seal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Seal\Traits\Attribute\SealAttribute;
use App\Models\Seal\Traits\Relationship\SealRelationship;

class Seal extends Model
{
    // Traits
    use SoftDeletes,
        SealAttribute,
        SealRelationship;

    protected $fillable =[
        'name'           ,
        'drawing_number' ,
        'bom_number'     ,
        'end_user'       ,
        'seal_type'      ,
        'size'           ,
        'material_number',
        'code'           ,
        'model'          ,
        'serial_number'  ,
        'tag'            ,
        'price'          ,
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
