<?php

namespace App\Http\Controllers;

use App\Models\Retard;
use Illuminate\Http\Request;
use App\Models\Employe;
class RetardController extends Controller
{
    public function index()
    {
        $retards = Retard::all();
        return view('retards.index', compact('retards'));
    }

    public function create()
    {
        $employes = Employe::all(); // Récupérez la liste des employés depuis votre modèle Employe
        return view('retards.create', compact('employes')); // Passez la variable $employes à la vue
    }
    

    public function store(Request $request)
    {
        // Valide et enregistre un nouveau retard
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_retard' => 'required|date',
            'motif' => 'required|string',
            'minutes_retard' => 'required|integer',
         
            'justifie' => 'required|in:oui,non',
        ]);

        Retard::create($request->all());

        return redirect()->route('retards.index')
            ->with('success', 'Retard créé avec succès.');
    }

    public function show(Retard $retard)
    {
        // Affiche les détails d'un retard spécifique
        return view('retards.show', compact('retard'));
    }

    public function edit(Retard $retard)
    {
        // Affiche le formulaire d'édition pour un retard spécifique
        return view('retards.edit', compact('retard'));
    }

    public function update(Request $request, Retard $retard)
    {
        // Valide et met à jour un retard existant
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_retard' => 'required|date',
            'motif' => 'required|string',
            'minutes_retard' => 'required|integer',
         
            'justifie' => 'required|in:oui,non',
        ]);

        $retard->update($request->all());

        return redirect()->route('retards.index')
            ->with('success', 'Retard mis à jour avec succès.');
    }

    public function destroy(Retard $retard)
    {
        // Supprime un retard
        $retard->delete();

        return redirect()->route('retards.index')
            ->with('success', 'Retard supprimé avec succès.');
    }
}
