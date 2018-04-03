<?php

namespace App\Models\Seal\Traits\Attribute;

use Illuminate\Support\Facades\Route;
/**
 * Trait SealPricingHistoryAttribute.
 */
trait SealPricingHistoryAttribute
{
    public function getAddPricingHistoryButtonAttribute()
    {
        return '<a href="'.route('admin.seal.pricing_history.create', $this->seal_id).'" class="btn btn-success" data-toggle="tooltip" title="Add Pricing History"><i class="fa fa-plus"></i></a>';
    }

    public function getShowDeletedButtonAttribute()
    {
        return '<a href="'.route('admin.seal.pricing_history.deleted', [$this->seal_id, $this]).'" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View Deleted"><i class="fa fa-search"></i></a>';
    }

    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.seal.pricing_history.show', [$this->seal_id, $this]).'" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'"><i class="fa fa-search"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.seal.pricing_history.edit', [$this->seal_id, $this]).'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"><i class="fa fa-pencil"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id) {
            return '<a href="'.route('admin.seal.pricing_history.destroy', [$this->seal_id, $this]).'"
                 data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                 class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"><i class="fa fa-trash"></i></a> ';
        }
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.seal.pricing_history.delete-permanently', [$this->seal_id, $this]).'" name="confirm_item" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Permanently"><i class="fa fa-trash"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.seal.pricing_history.restore', [$this->seal_id, $this]).'" name="confirm_item" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Restore Pricing History"><i class="fa fa-refresh"></i></a> ';
    }

    public function getPrimaryActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
                <div class="btn-group btn-group-sm" role="group" aria-label="Seal Actions">
                    '.$this->add_pricing_history_button.'
                    '.$this->restore_button.'
                    '.$this->delete_permanently_button.'
                </div>';
        }

        return '
                <div class="btn-group btn-group-sm" role="group" aria-label="Seal Actions">
                    '.$this->add_pricing_history_button.'
                    '.$this->edit_button.'
                    '.$this->delete_button.'
                </div>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
                <div class="btn-group btn-group-sm" role="group" aria-label="Seal Actions">
                    '.$this->show_deleted_button.'
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
