<?php

namespace App\Models\BuyAndResaleProposal\Traits\Attribute;

use Illuminate\Support\Facades\Route;
/**
 * Trait BuyAndResaleProposalAttribute.
 */
trait BuyAndResaleProposalAttribute
{
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.buy-and-resale-proposal.show', $this).'" class="btn btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (auth()->user()->can('edit buy and resale proposal')) {
            return '<a href="'.route('admin.buy-and-resale-proposal.edit', $this).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('delete buy and resale proposal')) {
            if ($this->id) {
                return '<a href="'.route('admin.buy-and-resale-proposal.destroy', $this).'"
                     data-method="delete"
                     data-trans-button-cancel="'.__('buttons.general.cancel').'"
                     data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                     data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                     class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        if (auth()->user()->can('force delete buy and resale proposal')) {
            return '<a href="'.route('admin.buy-and-resale-proposal.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Permanently"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        if (auth()->user()->can('restore buy and resale proposal')) {
            return '<a href="'.route('admin.buy-and-resale-proposal.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore BuyAndResaleProposal"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
                <div class="btn-group btn-group-sm" role="group" aria-label="BuyAndResaleProposal Actions">
                  '.$this->restore_button.'
                  '.$this->delete_permanently_button.'
                </div>';
        }

        return '
            <div class="btn-group btn-group-sm" role="group" aria-label="BuyAndResaleProposal Actions">
            '.$this->show_button.'
            '.$this->edit_button.'
            '.$this->delete_button.'
            </div>';
    }
}
