@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h1>Modifier la Tâche ou Projet</h1>

        <form action="{{ route('accomplissements.update', $accomplissement->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tache_projet">Tâche/Projet :</label>
                <input type="text" name="tache_projet" value="{{ $accomplissement->tache_projet }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date_accomplissement">Date d'Accomplissement :</label>
                <input type="date" name="date_accomplissement" value="{{ $accomplissement->date_accomplissement }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="heures_travail">Heures de Travail :</label>
                <input type="number" name="heures_travail" value="{{ $accomplissement->heures_travail }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="pourcentage">Pourcentage d'Accomplissement :</label>
                <input type="number" name="pourcentage" value="{{ $accomplissement->pourcentage }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="commentaires">Commentaires :</label>
                <textarea name="commentaires" class="form-control">{{ $accomplissement->commentaires }}</textarea>
            </div>

            <!-- Nouveaux champs -->
            <div class="form-group">
                <label for="date_debut_tache">Date de Début de la Tâche :</label>
                <input type="date" name="date_debut_tache" value="{{ $accomplissement->date_debut_tache }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="date_fin_tache">Date de Fin de la Tâche :</label>
                <input type="date" name="date_fin_tache" value="{{ $accomplissement->date_fin_tache }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="responsable">Responsable :</label>
                <input type="text" name="responsable" value="{{ $accomplissement->responsable }}" class="form-control">
            </div>
            <!-- Fin des nouveaux champs -->

            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        </form>
    </div>
@endsection

@section('css')
    <style>
        .form-group {
            margin-bottom: 20px;
        }
    </style>
@endsection
