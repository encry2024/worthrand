<?php

namespace App\Models\Aftermarket\Traits\Attribute;

use Illuminate\Support\Facades\Route;
use File;
/**
 * Trait AftermarketAttribute.
 */
trait AftermarketAttribute
{
    public function getModelFilesAttribute()
    {
        $file_controller = [];
        if(File::exists('storage/aftermarket/'.$this->id)) {
            $files = collect(File::allFiles('storage/aftermarket/'.$this->id))->filter(function ($file) {
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
                            <a class="btn btn-warning btn-sm text-white pull-right" href="'.route('admin.aftermarket.download', [$this->id, $file]).'"><i class="fa fa-download"></i></a>
                            <a class="btn btn-primary btn-sm pull-right" href="'.asset('storage/aftermarket/'.$this->id.'/'.$file) .'" data-toggle="tooltip" title="View File"><i class="fa fa-search"></i></a>
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
        return $this->ccn_number;
    }

    public function getData2Attribute()
    {
        return $this->model;
    }

    public function getData3Attribute()
    {
        return $this->part_number;
    }

    public function getData4Attribute()
    {
        return $this->reference_number;
    }

    public function getData5Attribute()
    {
        return $this->serial_number;
    }

    public function getData6Attribute()
    {
        return $this->sap_number;
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
        return '<a href="'.route('admin.aftermarket.show', $this).'" class="btn btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.aftermarket.edit', $this).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id) {
            return '<a href="'.route('admin.aftermarket.destroy', $this).'"
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
        return '<a href="'.route('admin.aftermarket.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Permanently"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.aftermarket.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore Aftermarket"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
                <div class="btn-group btn-group-sm" role="group" aria-label="Aftermarket Actions">
                  '.$this->restore_button.'
                  '.$this->delete_permanently_button.'
                </div>';
        }

        return '
            <div class="btn-group btn-group-sm" role="group" aria-label="Aftermarket Actions">
            '.$this->show_button.'
            '.$this->edit_button.'
            '.$this->delete_button.'
            </div>';
    }
}
