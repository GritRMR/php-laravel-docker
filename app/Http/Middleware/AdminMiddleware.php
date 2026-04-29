<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
{
    if (Auth::check() && Auth::user()->usertype == 'admin') {
        return $next($request);
    }

    // Returns a 403 error if the user is not an admin
    abort(403, 'Unauthorized access'); 
}
}
