<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->usertype === 'admin') {
            return $next($request);
        }
    
        // For debugging - log rejection details
        \Log::warning('Admin access denied', [
            'user_id' => auth()->id(),
            'usertype' => auth()->check() ? auth()->user()->usertype : 'not logged in'
        ]);
    
        return redirect('/login')->with('error', 'Administrator privileges required');
    }
}