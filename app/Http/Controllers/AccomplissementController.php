<?php

namespace App\Http\Controllers;

use App\Models\Accomplissement;
use Illuminate\Http\Request;
use App\Models\Employe; // Assurez-vous d'importer le modèle Employe


class AccomplissementController extends Controller
{
    // Méthode pour afficher la liste des tâches
    public function index()
    {
        $accomplissements = Accomplissement::all();
        return view('accomplissements.index', ['accomplissements' => $accomplissements]);
    }

    // Méthode pour afficher le formulaire de création de tâche
    public function create()
    {
        // Récupérez la liste des employés
        $employees = Employe::all();

        // Envoyez la liste des employés à la vue
        return view('accomplissements.create', ['employees' => $employees]);
    }

    // Méthode pour enregistrer une nouvelle tâche
    public function store(Request $request)
    {
        $data = $request->validate([
            'tache_projet' => 'required|string',
            'date_accomplissement' => 'required|date',
            'commentaires' => 'nullable|string',
            'heures_travail' => 'required|integer',
            'pourcentage' => 'required|integer',
            'date_debut_tache' => 'nullable|date',
            'date_fin_tache' => 'nullable|date',
            'responsable' => 'nullable|string',
            'employe_id' => 'required|integer', // Assurez-vous que vous validez employe_id
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);
    
        Accomplissement::create($data);
    
        return redirect()->route('accomplissements.index')->with('success', 'Tâche créée avec succès!');
    }

    // Méthode pour afficher les détails d'une tâche spécifique
    public function show(Accomplissement $accomplissement)
    {
        return view('accomplissements.show', ['accomplissement' => $accomplissement]);
    }

    // Méthode pour afficher le formulaire de modification d'une tâche
    public function edit(Accomplissement $accomplissement)
    {
        return view('accomplissements.edit', ['accomplissement' => $accomplissement]);
    }

    // Méthode pour mettre à jour les informations d'une tâche
    public function update(Request $request, Accomplissement $accomplissement)
    {
        $data = $request->validate([
            'tache_projet' => 'required|string',
            'date_accomplissement' => 'required|date',
            'commentaires' => 'nullable|string',
            'heures_travail' => 'required|integer',
            'pourcentage' => 'required|integer',
            'date_debut_tache' => 'nullable|date',
            'date_fin_tache' => 'nullable|date',
            'responsable' => 'nullable|string',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);
    
        $accomplissement->update($data);
    
        return redirect()->route('accomplissements.index')->with('success', 'Tâche mise à jour avec succès!');
    }

    // Méthode pour supprimer une tâche
    public function destroy(Accomplissement $accomplissement)
    {
        $accomplissement->delete();

        return redirect()->route('accomplissements.index')->with('success', 'Tâche supprimée avec succès!');
    }
}
