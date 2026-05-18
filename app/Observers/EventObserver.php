<?php

namespace App\Observers;

use App\Models\AAEvent;

use Illuminate\Support\Facades\Log;

class EventObserver
{
    public function created(AAEvent $event)
    {
        Log::info('Event created: ' . $event->title);
    }

    public function updated(AAEvent $event)
    {
        Log::info('Event updated: ' . $event->title);
    }

    public function deleted(AAEvent $event)
    {
        Log::info('Event deleted: ' . $event->title);
    }
}