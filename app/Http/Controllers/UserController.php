<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function redirectByRole()
    {
        $user = Auth::user();

        if ($user->role === 'demandeur') {
            return redirect()->route('demandeur.dashboard');
        } elseif ($user->role === 'offreur') {
            return redirect()->route('offreur.dashboard');
        }

        abort(403, 'Rôle non autorisé');
    }
}
