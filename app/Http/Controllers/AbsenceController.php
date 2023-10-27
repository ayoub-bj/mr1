<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Employe;
use Carbon\Carbon; 
class AbsenceController extends Controller
{
    // Méthode pour afficher la liste des absences
    public function index()
    {
        $absences = Absence::all();
        return view('absences.index', compact('absences'));
    }

    // Méthode pour afficher le formulaire de création d'une absence
    public function create()
    {
        $employees = Employe::all();
        return view('absences.create', compact('employees'));
    }

    // Méthode pour enregistrer une nouvelle absence
    public function store(Request $request)
    {
        $data = $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_absence' => 'required|date',
            'motif' => 'required|string',
            'type_absence' => 'required|string',
            'justificatif' => 'nullable|string',
            'heure_debut_absence' => 'nullable|date_format:H:i',
            'heure_fin_absence' => 'nullable|date_format:H:i',
        ]);

        Absence::create($data);

        return redirect()->route('absences.index')->with('success', 'Absence enregistrée avec succès!');
    }

    // Méthode pour afficher le formulaire de modification d'une absence
   
    public function edit(Absence $absence)
    {
        // Vérifiez si la demande d'absence a été créée il y a moins de 72 heures
        $created_at = Carbon::parse($absence->created_at);
        $now = Carbon::now();

        // Si la demande a été créée il y a plus de 72 heures, redirigez avec un message d'erreur
        if ($now->diffInHours($created_at) > 72) {
            return redirect()->route('absences.index')->with('error', 'La période de modification de la demande d\'absence est expirée.');
        }

        // Si la demande a été créée il y a moins de 72 heures, affichez le formulaire d'édition
        $employees = Employe::all();
        return view('absences.edit', compact('absence', 'employees'));
    }
    // Méthode pour mettre à jour les informations d'une absence
    public function update(Request $request, Absence $absence)
    {
        $data = $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_absence' => 'required|date',
            'motif' => 'required|string',
            'type_absence' => 'required|string',
            'justificatif' => 'nullable|string',
            'heure_debut_absence' => 'nullable|date_format:H:i',
            'heure_fin_absence' => 'nullable|date_format:H:i',
        ]);

        $absence->update($data);

        return redirect()->route('absences.index')->with('success', 'Absence mise à jour avec succès!');
    }

    // Méthode pour afficher les détails d'une absence spécifique
    public function show(Absence $absence)
    {
        return view('absences.show', compact('absence'));
    }
}
