<?php

namespace App\Services;

use App\Models\AAEvent;
use Illuminate\Support\Facades\Auth;

class EventService{
      public function getAllEvents()
    {
        return AAEvent::all();
    }

    public function createEvent(array $data)
    {
        return AAEvent::create([
            'title'       => $data['title'],
            'description' => $data['description'],
            'location'    => $data['location'],
            'start_date'  => $data['start_date'],
            'end_date'    => $data['end_date'],
            'user_id'     => Auth::id(),
        ]);
    }
      public function updateEvent(AAEvent $event, array $data)
    {
        $event->update($data);
        return $event;
    }

    public function deleteEvent(AAEvent $event)
    {
        $event->delete();
    }

    public function getUpcomingEvents()
    {
        return AAEvent::orderBy('start_date')->get();
    }


}