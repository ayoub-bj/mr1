@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Détails de la Tâche ou Projet</h1>

        <div class="details-container">
            <p><strong>Tâche/Projet :</strong> {{ $accomplissement->tache_projet }}</p>
            <p><strong>Employé :</strong> {{ $accomplissement->employe->fullname }}</p>
            <p><strong>Date d'Accomplissement :</strong> {{ $accomplissement->date_accomplissement }}</p>
            <p><strong>Heures de Travail :</strong> {{ $accomplissement->heures_travail }}</p>
            <p><strong>Pourcentage d'Accomplissement :</strong> {{ $accomplissement->pourcentage }}%</p>
            <p><strong>Commentaires :</strong> {{ $accomplissement->commentaires }}</p>
            <!-- Nouveaux champs -->
            <p><strong>Date de Début de la Tâche :</strong> {{ $accomplissement->date_debut_tache }}</p>
            <p><strong>Date de Fin de la Tâche :</strong> {{ $accomplissement->date_fin_tache }}</p>
            <p><strong>Responsable :</strong> {{ $accomplissement->responsable }}</p>
            <!-- Fin des nouveaux champs -->

            <!-- Affichez d'autres détails de la tâche ici -->

            <a href="{{ route('accomplissements.index') }}" class="btn btn-primary">Retour à la Liste des Tâches</a>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
