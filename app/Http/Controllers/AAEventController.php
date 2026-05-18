<?php

namespace App\Http\Controllers;

use App\Models\AAEvent;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function __construct(private EventService $eventService)
    {}

    public function index()
    {
        $events = $this->eventService->getAllEvents();
        return view('events.index', compact('events'));
    }

    public function show(AAEvent $event)  
    {
        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'location'    => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after:start_date',
        ]);

        $this->eventService->createEvent($request->validated());

        return redirect()->route('events.index')
                         ->with('success', 'Event created successfully.');
    }

    public function edit(AAEvent $event)  
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, AAEvent $event)  
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'location'    => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after:start_date',
        ]);

        $this->eventService->updateEvent($event, $request->validated());

        return redirect()->route('events.index')
                         ->with('success', 'Event updated successfully.');
    }

    public function destroy(AAEvent $event)  
    {
        $this->eventService->deleteEvent($event);

        return redirect()->route('events.index')
                         ->with('success', 'Event deleted successfully.');
    }

    public function calendar()
    {
        $events = $this->eventService->getUpcomingEvents();
        return view('calendar.index', compact('events'));
    }
}