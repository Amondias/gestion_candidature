<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show()
    {
        return view('index');
    }

    public function setRole($role)
    {
        $user = Auth::user();

        if (in_array($role, ['demandeur', 'offreur'])) {
            $user->role_actif = $role;
            $user->save();

            return redirect()->route("$role.dashboard");
        }

        return redirect()->back()->with('error', 'Rôle invalide.');
    }
}