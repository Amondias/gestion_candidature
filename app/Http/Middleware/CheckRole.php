<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user->role_actif === 'demandeur') {
            return redirect()->route('demandeur.dashboard');
        } elseif ($user->role_actif === 'offreur') {
            return redirect()->route('offreur.dashboard');
        }
        return $next($request);
    }
}
