<?php

namespace App\Listeners\Backend\Customer;

/**
 * Class CustomerEventListener.
 */
class CustomerEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info( $event->doer .' Created Customer "'. $event->customer .'"');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info( $event->doer .' Updated Customer "'. $event->customer .'"');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info( $event->doer .' Deleted Customer "'. $event->customer .'"');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info( $event->doer .' Permanently Deleted Customer "'. $event->customer .'"');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info( $event->doer .' Restored Customer "'. $event->customer .'"');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Customer\CustomerCreated::class,
            'App\Listeners\Backend\Customer\CustomerEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Customer\CustomerUpdated::class,
            'App\Listeners\Backend\Customer\CustomerEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Customer\CustomerDeleted::class,
            'App\Listeners\Backend\Customer\CustomerEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Customer\CustomerPermanentlyDeleted::class,
            'App\Listeners\Backend\Customer\CustomerEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Customer\CustomerRestored::class,
            'App\Listeners\Backend\Customer\CustomerEventListener@onRestored'
        );
    }
}
