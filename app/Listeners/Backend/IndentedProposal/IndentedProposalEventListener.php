<?php

namespace App\Listeners\Backend\IndentedProposal;

/**
 * Class IndentedProposalEventListener.
 */
class IndentedProposalEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info( $event->doer .' Created Indented Proposal "'. $event->indented_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info( $event->doer .' Updated Indented Proposal "'. $event->indented_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info( $event->doer .' Deleted Indented Proposal "'. $event->indented_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info( $event->doer .' Permanently Deleted Indented Proposal "'. $event->indented_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info( $event->doer .' Restored Indented Proposal "'. $event->indented_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onUploaded($event)
    {
        \Log::info( $event->doer .' Uploaded file "'. $event->file_name .'" on Indented Proposal "'. $event->indented_proposal .'"');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\IndentedProposal\IndentedProposalCreated::class,
            'App\Listeners\Backend\IndentedProposal\IndentedProposalEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\IndentedProposal\IndentedProposalUpdated::class,
            'App\Listeners\Backend\IndentedProposal\IndentedProposalEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\IndentedProposal\IndentedProposalDeleted::class,
            'App\Listeners\Backend\IndentedProposal\IndentedProposalEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\IndentedProposal\IndentedProposalPermanentlyDeleted::class,
            'App\Listeners\Backend\IndentedProposal\IndentedProposalEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\IndentedProposal\IndentedProposalRestored::class,
            'App\Listeners\Backend\IndentedProposal\IndentedProposalEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\IndentedProposal\IndentedProposalUploaded::class,
            'App\Listeners\Backend\IndentedProposal\IndentedProposalEventListener@onUploaded'
        );
    }
}
