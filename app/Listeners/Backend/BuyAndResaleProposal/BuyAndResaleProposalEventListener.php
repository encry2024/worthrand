<?php

namespace App\Listeners\Backend\BuyAndResaleProposal;

/**
 * Class BuyAndResaleProposalEventListener.
 */
class BuyAndResaleProposalEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info( $event->doer .' Created Buy And Resale Proposal "'. $event->buy_and_resale_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info( $event->doer .' Updated Buy And Resale Proposal "'. $event->buy_and_resale_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info( $event->doer .' Deleted Buy And Resale Proposal "'. $event->buy_and_resale_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info( $event->doer .' Permanently Deleted Buy And Resale Proposal "'. $event->buy_and_resale_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info( $event->doer .' Restored Buy And Resale Proposal "'. $event->buy_and_resale_proposal .'"');
    }

    /**
     * @param $event
     */
    public function onUploaded($event)
    {
        \Log::info( $event->doer .' Uploaded file "'. $event->file_name .'" on Buy And Resale Proposal "'. $event->buy_and_resale_proposal .'"');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalCreated::class,
            'App\Listeners\Backend\BuyAndResaleProposal\BuyAndResaleProposalEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalUpdated::class,
            'App\Listeners\Backend\BuyAndResaleProposal\BuyAndResaleProposalEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalDeleted::class,
            'App\Listeners\Backend\BuyAndResaleProposal\BuyAndResaleProposalEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalPermanentlyDeleted::class,
            'App\Listeners\Backend\BuyAndResaleProposal\BuyAndResaleProposalEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalRestored::class,
            'App\Listeners\Backend\BuyAndResaleProposal\BuyAndResaleProposalEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalUploaded::class,
            'App\Listeners\Backend\BuyAndResaleProposal\BuyAndResaleProposalEventListener@onUploaded'
        );
    }
}
