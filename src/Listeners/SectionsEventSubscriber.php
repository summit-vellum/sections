<?php

namespace Quill\Sections\Listeners;
use Illuminate\Support\Facades\Log;

class SectionsEventSubscriber
{
    /**
     * Handle the event.
     */
    public function handleCreated($event) 
    {
        //
    } 

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Quill\Sections\Events\SectionsCreated',
            'Quill\Sections\Listeners\SectionsEventSubscriber@handleCreated'
        ); 
    }
}