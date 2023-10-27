@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Créer une Nouvelle Tâche ou Projet</h1>

        <form action="{{ route('accomplissements.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="employe_id">Employé :</label>
                <select name="employe_id" class="form-control" required>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tache_projet">Tâche/Projet :</label>
                <input type="text" name="tache_projet" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date_accomplissement">Date d'Accomplissement :</label>
                <input type="date" name="date_accomplissement" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="heures_travail">Heures de Travail :</label>
                <input type="number" name="heures_travail" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="pourcentage">Pourcentage d'Accomplissement :</label>
                <input type="number" name="pourcentage" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="commentaires">Commentaires :</label>
                <textarea name="commentaires" class="form-control"></textarea>
            </div>

            <!-- Nouveaux champs -->
            <div class="form-group">
                <label for="date_debut_tache">Date de Début de la Tâche :</label>
                <input type="date" name="date_debut_tache" class="form-control">
            </div>

            <div class="form-group">
                <label for="date_fin_tache">Date de Fin de la Tâche :</label>
                <input type="date" name="date_fin_tache" class="form-control">
            </div>

            <div class="form-group">
                <label for="responsable">Responsable :</label>
                <input type="text" name="responsable" class="form-control">
            </div>
            <!-- Fin des nouveaux champs -->

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
