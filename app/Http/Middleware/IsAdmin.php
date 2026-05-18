<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use App\Models\AAUser;

class IsAdmin
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

        if(!Auth()->check() || !Auth()->user->isAdmin()){
            return redirect('/dashboard')
                    ->with('error','Access denied. Admins only.');
        }
        return $next($request);
    }
}
