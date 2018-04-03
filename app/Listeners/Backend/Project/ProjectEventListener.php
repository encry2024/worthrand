<?php

namespace App\Listeners\Backend\Project;

/**
 * Class ProjectEventListener.
 */
class ProjectEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info( $event->doer .' Created Project "'. $event->project .'"');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info( $event->doer .' Updated Project "'. $event->project .'"');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info( $event->doer .' Deleted Project "'. $event->project .'"');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info( $event->doer .' Permanently Deleted Project "'. $event->project .'"');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info( $event->doer .' Restored Project "'. $event->project .'"');
    }

    /**
     * @param $event
     */
    public function onUploaded($event)
    {
        \Log::info( $event->doer .' Uploaded file "'. $event->file_name .'" on Project "'. $event->project .'"');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Project\ProjectCreated::class,
            'App\Listeners\Backend\Project\ProjectEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Project\ProjectUpdated::class,
            'App\Listeners\Backend\Project\ProjectEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Project\ProjectDeleted::class,
            'App\Listeners\Backend\Project\ProjectEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Project\ProjectPermanentlyDeleted::class,
            'App\Listeners\Backend\Project\ProjectEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Project\ProjectRestored::class,
            'App\Listeners\Backend\Project\ProjectEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Project\ProjectUploaded::class,
            'App\Listeners\Backend\Project\ProjectEventListener@onUploaded'
        );
    }
}
