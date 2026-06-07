<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AAUser;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if(!$user || $user->role !== 'admin'){
            return redirect()->route('dashboard')
            ->with('error' , 'Access denied - Admins only');
        }
        return $next($request);
    }
}
