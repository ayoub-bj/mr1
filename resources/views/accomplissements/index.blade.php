@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h1>Liste des Tâches et Projets Accomplis</h1>

        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Employé</th>
                    <th scope="col">Tâche/Projet</th>
                    <th scope="col">Date d'Accomplissement</th>
                    <th scope="col">Heures de Travail</th>
                    <th scope="col">Pourcentage d'Accomplissement</th>
                    <th scope="col">Date de Début de la Tâche</th>
                    <th scope="col">Date de Fin de la Tâche</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accomplissements as $accomplissement)
                    <tr>
                        
                        <td>{{ $accomplissement->employe->fullname }}</td>
                        <td>{{ $accomplissement->tache_projet }}</td>
                        <td>{{ $accomplissement->date_accomplissement }}</td>
                        <td>{{ $accomplissement->heures_travail }}</td>
                        <td>{{ $accomplissement->pourcentage }}%</td>
                        <td>{{ $accomplissement->date_debut_tache }}</td>
                        <td>{{ $accomplissement->date_fin_tache }}</td>
                        <td>{{ $accomplissement->responsable }}</td>
                        <td>
                            <a href="{{ route('accomplissements.show', $accomplissement->id) }}"
                                class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('accomplissements.edit', $accomplissement->id) }}"
                                class="btn btn-primary btn-sm">Modifier</a>
                            <!-- Ajoutez ici un formulaire pour la suppression -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
