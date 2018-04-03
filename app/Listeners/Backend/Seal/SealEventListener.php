<?php

namespace App\Listeners\Backend\Seal;

/**
 * Class SealEventListener.
 */
class SealEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info( $event->doer .' Created Seal "'. $event->seal .'"');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info( $event->doer .' Updated Seal "'. $event->seal .'"');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info( $event->doer .' Deleted Seal "'. $event->seal .'"');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info( $event->doer .' Permanently Deleted Seal "'. $event->seal .'"');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info( $event->doer .' Restored Seal "'. $event->seal .'"');
    }

    /**
     * @param $event
     */
    public function onUploaded($event)
    {
        \Log::info( $event->doer .' Uploaded file "'. $event->file_name .'" on Seal "'. $event->seal .'"');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Seal\SealCreated::class,
            'App\Listeners\Backend\Seal\SealEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Seal\SealUpdated::class,
            'App\Listeners\Backend\Seal\SealEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Seal\SealDeleted::class,
            'App\Listeners\Backend\Seal\SealEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Seal\SealPermanentlyDeleted::class,
            'App\Listeners\Backend\Seal\SealEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Seal\SealRestored::class,
            'App\Listeners\Backend\Seal\SealEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Seal\SealUploaded::class,
            'App\Listeners\Backend\Seal\SealEventListener@onUploaded'
        );
    }
}
