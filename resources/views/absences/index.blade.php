@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h1>Liste des Absences</h1>

        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Employé</th>
                    <th scope="col">Date de l'Absence</th>
                    <th scope="col">Motif</th>
                    <th scope="col">Type d'Absence</th>
                    <th scope="col">Justificatif</th>
                    <th scope="col">Heure de Début</th>
                    <th scope="col">Heure de Fin</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absences as $absence)
                    <tr>
                        <td>{{ $absence->employe->fullname }}</td>
                        <td>{{ $absence->date_absence }}</td>
                        <td>{{ $absence->motif }}</td>
                        <td>{{ $absence->type_absence }}</td>
                        <td>{{ $absence->justificatif ?? 'Non spécifié' }}</td>
                        <td>{{ $absence->heure_debut_absence ?? 'Non spécifié' }}</td>
                        <td>{{ $absence->heure_fin_absence ?? 'Non spécifié' }}</td>
                        <td>
                            <a href="{{ route('absences.show', $absence->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('absences.edit', $absence->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <!-- Ajoutez ici un formulaire pour la suppression si nécessaire -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
