<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard()
    {
        $offres = Offre::with('user')->orderBy('created_at', 'asc')->get();
        return view('offreur.dashboard', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offreur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nom_entreprise' => 'required|string',
        'email' => 'required|string',
        'numero' => 'required|string',
        'domaine' => 'required|string',
        'specialisation' => 'nullable|string',
        'qualification' => 'required|string',
        'competence' => 'required|string',
    ]);

    Offre::create([
        'nom_entreprise' => $request->nom_entreprise,
        'numero' => $request->numero,
        'domaine' => $request->domaine,
        'specialisation' => $request->specialisation,
        'qualification' => $request->qualification,
        'competence' => $request->competence,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('offre.dashboard')->with('success', 'Offre enregistrée.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offre = offre::findOrFail($id);
        return view('offreur.show', compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offre $offre)
    {
        // Vérifie que l'utilisateur connecté est bien le créateur de l'offre
        if ($offre->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('offreur.edit', compact('offre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        $offre = Offre::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $offre->update($request->all());
        return redirect()->route('offre.mes')->with('success', 'Offre modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        $offre = Offre::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $offre->delete();
        return redirect()->route('offre.mes')->with('success', 'Offre supprimée.');
    }

    public function mesoffres()
    {
        $offres = Offre::where('user_id', Auth::id())->get();
        return view('offreur.mes', compact('offres'));
    }

}
