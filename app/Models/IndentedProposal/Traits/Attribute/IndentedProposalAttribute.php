<?php

namespace App\Models\IndentedProposal\Traits\Attribute;

use Illuminate\Support\Facades\Route;
/**
 * Trait IndentedProposalAttribute.
 */
trait IndentedProposalAttribute
{
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.indented-proposal.show', $this).'" class="btn btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (auth()->user()->can('edit indented proposal')) {
            return '<a href="'.route('admin.indented-proposal.edit', $this).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('delete indented proposal')) {
            if ($this->id) {
                return '<a href="'.route('admin.indented-proposal.destroy', $this).'"
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
        if (auth()->user()->can('force delete indented proposal')) {
            return '<a href="'.route('admin.indented-proposal.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Permanently"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        if (auth()->user()->can('restore indented proposal')) {
            return '<a href="'.route('admin.indented-proposal.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore IndentedProposal"></i></a> ';
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
                <div class="btn-group btn-group-sm" role="group" aria-label="IndentedProposal Actions">
                  '.$this->restore_button.'
                  '.$this->delete_permanently_button.'
                </div>';
        }

        return '
            <div class="btn-group btn-group-sm" role="group" aria-label="IndentedProposal Actions">
            '.$this->show_button.'
            '.$this->edit_button.'
            '.$this->delete_button.'
            </div>';
    }
}
