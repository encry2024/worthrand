<?php

namespace App\Listeners\Backend\Aftermarket;

/**
 * Class AftermarketEventListener.
 */
class AftermarketEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info( $event->doer .' Created Aftermarket "'. $event->aftermarket .'"');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info( $event->doer .' Updated Aftermarket "'. $event->aftermarket .'"');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info( $event->doer .' Deleted Aftermarket "'. $event->aftermarket .'"');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info( $event->doer .' Permanently Deleted Aftermarket "'. $event->aftermarket .'"');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info( $event->doer .' Restored Aftermarket "'. $event->aftermarket .'"');
    }

    /**
     * @param $event
     */
    public function onUploaded($event)
    {
        \Log::info( $event->doer .' Uploaded file "'. $event->file_name .'" on Aftermarket "'. $event->aftermarket .'"');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Aftermarket\AftermarketCreated::class,
            'App\Listeners\Backend\Aftermarket\AftermarketEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Aftermarket\AftermarketUpdated::class,
            'App\Listeners\Backend\Aftermarket\AftermarketEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Aftermarket\AftermarketDeleted::class,
            'App\Listeners\Backend\Aftermarket\AftermarketEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Aftermarket\AftermarketPermanentlyDeleted::class,
            'App\Listeners\Backend\Aftermarket\AftermarketEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Aftermarket\AftermarketRestored::class,
            'App\Listeners\Backend\Aftermarket\AftermarketEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Aftermarket\AftermarketUploaded::class,
            'App\Listeners\Backend\Aftermarket\AftermarketEventListener@onUploaded'
        );
    }
}
