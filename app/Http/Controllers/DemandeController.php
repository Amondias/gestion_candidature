<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function dashboard()
    {
        $demandes = Demande::with('user')->orderBy('created_at', 'asc')->get();
        return view('demandeur.dashboard', compact('demandes'));
    }

    public function create()
    {
        return view('demandeur.create');
    }

    public function store(Request $request){
        
    $request->validate([
        'nom_complet' => 'required|string',
        'numero' => 'required|string',
        'domaine' => 'required|string',
        'specialisation' => 'nullable|string',
        'qualification' => 'required|string',
        'competence' => 'required|string',
    ]);

    Demande::create([
        'nom_complet' => $request->nom_complet,
        'numero' => $request->numero,
        'domaine' => $request->domaine,
        'specialisation' => $request->specialisation,
        'qualification' => $request->qualification,
        'competence' => $request->competence,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('demande.dashboard')->with('success', 'Demande enregistrée.');
    }

    public function edit(Demande $demande)
    {
        // Vérifie que l'utilisateur connecté est bien le créateur de l'demande
        if ($demande->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('demandeur.edit', compact('demande'));
    }

    public function update(Request $request, $id)
    {
        $demande = Demande::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $demande->update($request->all());
        return redirect()->route('demande.mes')->with('success', 'Demande modifiée.');
    }

    public function show($id)
    {
        $demande = Demande::findOrFail($id);
        return view('demandeur.show', compact('demande'));
    }


    public function destroy($id)
    {
        $demande = Demande::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $demande->delete();
        return redirect()->route('demande.mes')->with('success', 'Demande supprimée.');
    }

    public function mesDemandes()
    {
        $demandes = Demande::where('user_id', Auth::id())->get();
        return view('demandeur.mes', compact('demandes'));
    }
}