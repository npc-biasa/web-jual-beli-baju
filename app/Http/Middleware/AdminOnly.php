<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $role = $user ? strtolower($user->role) : '';
        
        if ($role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}