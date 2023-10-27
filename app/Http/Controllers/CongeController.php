<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conge;
use App\Models\Employe;
use App\Models\Statistic;
use Carbon\Carbon;



class CongeController extends Controller
{
    // Affiche le formulaire pour créer un congé
    public function create()
    {
        $employees = Employe::all(); // Fetch all employees from the database
        return view('conges.create', compact('employees'));
    }


    
    // Enregistre la demande de congé dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'motif' => 'required|string|max:255',
            'statut' => 'required|in:en_attente,approuve,refuse',
            'commentaire' => 'nullable|string|max:255',
            'type' => 'required|in:conge_paye,conge_maladie,autre',
            // Ajoutez d'autres règles de validation au besoin
        ]);
    
        // Récupérez l'employé ID à partir des données du formulaire
        $employeId = $request->input('employe_id');
    
        // Créez une nouvelle instance de Conge avec employe_id défini sur l'ID de l'employé sélectionné
        $conge = Conge::create([
            'employe_id' => $employeId,
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'motif' => $request->input('motif'),
            'statut' => $request->input('statut'),
            'commentaire' => $request->input('commentaire'),
            'type' => $request->input('type'),
            // Ajoutez d'autres champs du modèle Conge si nécessaire
        ]);
    
        
    
        return redirect()->route('conges.index')->with('success', 'Demande de congé soumise avec succès.');
    }
    
    

    
    

     public function index()
    {
        $employe = Employe::find(auth()->user()->id);
    
        if (!$employe) {
            // Créez un objet MessageBag avec votre message d'erreur
            $errors = new \Illuminate\Support\MessageBag(['employe' => ['Employé non trouvé']]);
            // Rediriger vers la vue d'alerte avec le message d'erreur
            return view('layouts.alert', compact('errors'));
        }
    
        
        $conges = Conge::with('employe')->paginate(10);
        return view('conges.index', compact('conges'));
    }
    


    // Affiche les détails d'une demande de congé spécifique
    public function show($id)
    {
        // Récupère la demande de congé spécifique
        $conge = Conge::findOrFail($id);
        return view('conges.show', compact('conge'));
    }

    // Affiche le formulaire pour éditer une demande de congé

    public function edit($id)
{
    // Récupère la demande de congé spécifique
    $conge = Conge::findOrFail($id);
    
    // Récupère tous les employés pour le menu déroulant
    $employees = Employe::all();
    
    return view('conges.edit', compact('conge', 'employees'));
}


    // Met à jour une demande de congé dans la base de données
    public function update(Request $request, $id)
    {
        // Récupère la demande de congé spécifique
        $conge = Conge::findOrFail($id);
      
    
        
   
        // Valide les données du formulaire
        $conge->update([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'motif' => $request->motif,
            'statut' => $request->statut,
            'commentaire' => $request->commentaire,
            'type' => $request->type,
          
        ]);
    
        // Vérifiez si la date de début, la date de fin ou le motif a été modifié
        $dateDebutModifiee = $request->date_debut !== $conge->date_debut;
        $dateFinModifiee = $request->date_fin !== $conge->date_fin;
        $motifModifie = $request->motif !== $conge->motif;
        $commentaireModifie = $request->commentaire !== $conge->commentaire;

        // Vérifiez si le type de congé a été modifié
        $typeModifie = $request->type !== $conge->type;
    
        // Si le commentaire ou le type de congé a été modifié, mettez le statut à "en_attente"
        if ($dateDebutModifiee || $dateFinModifiee || $motifModifie || $commentaireModifie || $typeModifie) {
            $request->merge(['statut' => 'en_attente']);
        }
        // Si la date de début, la date de fin ou le motif a été modifié, mettez le statut à "en_attente"
       
    
        // Mettez à jour les champs de la demande de congé
        $conge->update([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'motif' => $request->motif,
            'statut' => $request->statut,
            'commentaire' => $request->commentaire,
            'type' => $request->type,
         
        ]);
    
        // ... (restez le code comme avant)
    
        // Redirigez vers la vue index avec un message de succès
        return redirect()->route('conges.index')->with('success', 'Demande de congé mise à jour avec succès.');
    }
    
    // Supprime une demande de congé de la base de données
    public function destroy($id)
    {
        // Récupère la demande de congé spécifique et la supprime
        $conge = Conge::findOrFail($id);
        $conge->delete();

        return redirect()->route('conges.index')->with('success', 'Demande de congé supprimée avec succès.');
    }
}
