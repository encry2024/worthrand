<?php

namespace App\Models\Project\Traits\Attribute;

use Illuminate\Support\Facades\Route;
use File;
/**
 * Trait ProjectAttribute.
 */
trait ProjectAttribute
{
    public function getModelFilesAttribute()
    {
        $file_controller = [];
        if(File::exists('storage/project/'.$this->id)) {
            $files = collect(File::allFiles('storage/project/'.$this->id))->filter(function ($file) {
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
                            <a class="btn btn-warning btn-sm text-white pull-right" href="'.route('admin.project.download', [$this->id, $file]).'"><i class="fa fa-download"></i></a>
                            <a class="btn btn-primary btn-sm pull-right" href="'.asset('storage/project/'.$this->id.'/'.$file) .'" data-toggle="tooltip" title="View File"><i class="fa fa-search"></i></a>
                        </td>
                    </tr>';
            }
        } else {
            $file_controller = [
                '<tr>
                    <td colspan="2">Files doesn\'t exist.</td>
                </tr>'
            ];
        }

        return $file_controller;
    }

    public function getData1Attribute()
    {
        return $this->status;
    }

    public function getData2Attribute()
    {
        return $this->epc_award;
    }

    public function getData3Attribute()
    {
        return $this->reference_number;
    }

    public function getData4Attribute()
    {
        return $this->final_result;
    }

    public function getData5Attribute()
    {
        return $this->serial_number;
    }

    public function getData6Attribute()
    {
        return $this->pump_model;
    }

    public function getData7Attribute()
    {
        return $this->tag_number;
    }

    public function getDataModelAttribute()
    {
        return class_basename($this);
    }
    
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.project.show', $this).'" class="btn btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.project.edit', $this).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id) {
            return '<a href="'.route('admin.project.destroy', $this).'"
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
        return '<a href="'.route('admin.project.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Permanently"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.project.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore Project"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
                <div class="btn-group btn-group-sm" role="group" aria-label="Project Actions">
                  '.$this->restore_button.'
                  '.$this->delete_permanently_button.'
                </div>';
        }

        return '
            <div class="btn-group btn-group-sm" role="group" aria-label="Project Actions">
            '.$this->show_button.'
            '.$this->edit_button.'
            '.$this->delete_button.'
            </div>';
    }
}
