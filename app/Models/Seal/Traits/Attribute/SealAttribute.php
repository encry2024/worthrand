<?php

namespace App\Models\Seal\Traits\Attribute;

use Illuminate\Support\Facades\Route;
use File;
/**
 * Trait SealAttribute.
 */
trait SealAttribute
{
    public function getModelFilesAttribute()
    {
        $file_controller = [];
        $files = collect(File::allFiles('storage/seal/'.$this->id))->filter(function ($file) {
            return in_array($file->getExtension(), ['png', 'pdf', 'jpg']);
        })
        ->sortByDesc(function ($file) {
            return $file->getCTime();
        })
        ->map(function ($file) {
            return $file->getBaseName();
        });

        foreach($files as $file) {
            $file_controller[] = 
                '<tr>
                    <td>
                        '.$file.'
                        <a class="btn btn-warning btn-sm text-white pull-right" href="'.route('admin.seal.download', [$this->id, $file]).'"><i class="fa fa-download"></i></a>
                        <a class="btn btn-primary btn-sm pull-right" href="'.asset('storage/seal/'.$this->id.'/'.$file) .'" data-toggle="tooltip" title="View File"><i class="fa fa-search"></i></a>
                    </td>
                </tr>';
        }

        return $file_controller;
    }


    public function getData1Attribute()
    {
        return $this->drawing_number;
    }

    public function getData2Attribute()
    {
        return $this->bom_number;
    }

    public function getData3Attribute()
    {
        return $this->end_user;
    }

    public function getData4Attribute()
    {
        return $this->seal_type;
    }

    public function getData5Attribute()
    {
        return $this->size;
    }

    public function getData6Attribute()
    {
        return $this->code;
    }

    public function getData7Attribute()
    {
        return $this->model;
    }

    public function getDataModelAttribute()
    {
        return class_basename($this);
    }
    
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.seal.show', $this).'" class="btn btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.seal.edit', $this).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id) {
            return '<a href="'.route('admin.seal.destroy', $this).'"
                 data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                 class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
        }
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.seal.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Permanently"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.seal.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore Seal"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
                <div class="btn-group btn-group-sm" role="group" aria-label="Seal Actions">
                  '.$this->restore_button.'
                  '.$this->delete_permanently_button.'
                </div>';
        }

        return '
            <div class="btn-group btn-group-sm" role="group" aria-label="Seal Actions">
            '.$this->show_button.'
            '.$this->edit_button.'
            '.$this->delete_button.'
            </div>';
    }
}
