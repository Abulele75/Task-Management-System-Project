<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AAEvent;
use App\Models\AAUser;

class EventPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(AAUser $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(AAUser $user, AAEvent $aAEvent): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(AAUser $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(AAUser $user, AAEvent $event )
    {
        return $user->id === $event->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(AAUser $user, AAEvent $event)
    {
          return $user->id === $event->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(AAUser $user, AAEvent $aAEvent): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(AAUser $user, AAEvent $aAEvent): bool
    {
        return false;
    }
}
