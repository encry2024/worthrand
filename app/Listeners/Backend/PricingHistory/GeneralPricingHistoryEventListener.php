<?php

namespace App\Listeners\Backend\PricingHistory;

/**
 * Class GeneralPricingHistoryEventListener.
 */
class GeneralPricingHistoryEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info( $event->doer .' Added '.$event->type.' Pricing History "'. $event->reference .'" on "'. $event->object .'"');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info( $event->doer .' Updated '.$event->reference.' '.$event->type.' Pricing History of "'. $event->object .'"');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info( $event->doer .' Deleted '.$event->reference.' '.$event->type.' Pricing History of "'. $event->object .'"');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info( $event->doer .' Permanently Deleted '.$event->reference.' '.$event->type.' Pricing History of "'. $event->object .'"');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info( $event->doer .' Restored '.$event->reference.' '.$event->type.' Pricing History of "'. $event->object .'"');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\PricingHistory\GeneralPricingHistoryCreated::class,
            'App\Listeners\Backend\PricingHistory\GeneralPricingHistoryEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\PricingHistory\GeneralPricingHistoryUpdated::class,
            'App\Listeners\Backend\PricingHistory\GeneralPricingHistoryEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\PricingHistory\GeneralPricingHistoryDeleted::class,
            'App\Listeners\Backend\PricingHistory\GeneralPricingHistoryEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\PricingHistory\GeneralPricingHistoryPermanentlyDeleted::class,
            'App\Listeners\Backend\PricingHistory\GeneralPricingHistoryEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\PricingHistory\GeneralPricingHistoryRestored::class,
            'App\Listeners\Backend\PricingHistory\GeneralPricingHistoryEventListener@onRestored'
        );
    }
}
