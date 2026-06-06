<?php

namespace App\Http\Controllers;

use App\Models\AAEvent;
use App\Models\AARegistration;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class AARegistrationController extends Controller
{
    
    public function __construct(private RegistrationService $registrationService)
    {}

    public function index(AAEvent $event)  
    {
        $registrations = $event->registrations;
        return view('events.registrations', compact('event', 'registrations'));
    }

    public function store(AAEvent $event)  
    {
        $result = $this->registrationService->register($event);

        if (isset($result['error'])) {
            return redirect()->back()->with('error', $result['error']);
        }

        return redirect()->back()->with('success', $result['success']);
    }

    public function approve(AAEvent $event, AARegistration $registration) 
    {
        $this->registrationService->approve($registration);
        return redirect()->back()->with('success', 'Registration approved.');
    }

    public function decline(AAEvent $event, AARegistration $registration)
    {
        $this->registrationService->decline($registration);
        return redirect()->back()->with('success', 'Registration declined.');
    }
}
