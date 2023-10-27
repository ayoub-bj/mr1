@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h1>Détails de l'Absence</h1>

        <div class="details-container">
            <p><strong>Employé :</strong> {{ $absence->employe->fullname }}</p>
            <p><strong>Date de l'Absence :</strong> {{ $absence->date_absence }}</p>
            <p><strong>Motif :</strong> {{ $absence->motif }}</p>
            <p><strong>Type d'Absence :</strong> {{ $absence->type_absence }}</p>
            <p><strong>Justificatif :</strong> {{ $absence->justificatif }}</p>
            <p><strong>Heure de Début :</strong> {{ $absence->heure_debut_absence }}</p>
            <p><strong>Heure de Fin :</strong> {{ $absence->heure_fin_absence }}</p>

            <a href="{{ route('absences.index') }}" class="btn btn-primary">Retour à la Liste des Absences</a>
        </div>
    </div>
@endsection
