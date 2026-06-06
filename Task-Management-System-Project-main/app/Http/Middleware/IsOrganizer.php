<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use App\Models\AAUser;

class IsOrganizer
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         /** @var AAUser $user */
        $user = Auth::user();
        

        if(!Auth()->check() || !Auth()->$user->isOrganizer()){
            return redirect('/dashboard')
                   ->with('error', 'Access denied. Organizers only.');
        }
        return $next($request);
    }
}
