<?php

namespace App\Services;

use App\Models\AAEvent;
use App\Models\AARegistration;
use Illuminate\Support\Facades\Auth;
use App\Mail\EventNotification;
use Illuminate\Support\Facades\Mail;

class RegistrationService
{
    public function register(AAEvent $event)
    {
        $existing = AARegistration::where('event_id', $event->id)
                                  ->where('user_id', Auth::id())
                                  ->first();

        if ($existing) {
            return ['error' => 'You are already registered for this event.'];
        }

        AARegistration::create([
            'event_id' => $event->id,
            'user_id'  => Auth::id(),
            'status'   => 'pending',
        ]);

        return ['success' => 'Registration submitted successfully.'];
    }

    public function approve(AARegistration $registration)
    {
      $registration->update(['status' => 'approved']);
    
    
    Mail::to($registration->user->email)
        ->send(new EventNotification(
            $registration->event,
            'Your registration has been approved!'
        ));
    }

    public function decline(AARegistration $registration)
    {
       $registration->update(['status' => 'declined']);

    
    Mail::to($registration->user->email)
        ->send(new EventNotification(
            $registration->event,
            'Your registration has been declined.'
        ));
    }
}