<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Demande;
use App\Models\Offre;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function toggleFollow(Request $request)
    {
        $request->validate([
            'followable_id' => 'required|integer',
            'followable_type' => 'required|in:App\Models\Demande,App\Models\Offre'
        ]);

        $existing = Follow::where('user_id', auth()->id())
                         ->where('followable_id', $request->followable_id)
                         ->where('followable_type', $request->followable_type)
                         ->first();

        if ($existing) {
            $existing->delete();
            return back()->with('success', 'Suivi retiré');
        }

        Follow::create([
            'user_id' => auth()->id(),
            'followable_id' => $request->followable_id,
            'followable_type' => $request->followable_type
        ]);

        return back()->with('success', 'Suivi ajouté');
    }

    public function myFollows()
    {
        $follows = auth()->user()->follows()->with('followable')->paginate(10);
        return view('follow.my', compact('follows'));
    }

    public function followsForMe()
    {
        // Pour les demandes
        $demandeFollows = Follow::whereIn('followable_id', 
            auth()->user()->demandes()->pluck('id'))
            ->where('followable_type', 'App\Models\Demande')
            ->with('user', 'followable')
            ->get();

        // Pour les offres
        $offreFollows = Follow::whereIn('followable_id', 
            auth()->user()->offres()->pluck('id'))
            ->where('followable_type', 'App\Models\Offre')
            ->with('user', 'followable')
            ->get();

        return view('follow.for_me', compact('demandeFollows', 'offreFollows'));
    }
}