@extends('adminlte::page')

@section('title', 'Liste des Congés')

@section('content')
    <h1>Liste des Congés</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Employé</th> <!-- Ajout de la colonne Employé -->
                <th>Motif</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Jours pris</th>
                <th>Statut</th>
                <th>Commentaire</th>
                <th>Type de Congé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conges as $conge)
                <tr>
                    <td>{{ $conge->employe->fullname }}</td> <!-- Affichez le nom complet de l'employé -->

                    <td>{{ $conge->motif }}</td>
                    <td>{{ $conge->date_debut }}</td>
                    <td>{{ $conge->date_fin }}</td>
                    <td>{{ $conge->jours_pris }}</td>
                    <td>{{ ucfirst($conge->statut) }}</td>
                    <td>{{ $conge->commentaire }}</td>
                    <td>{{ ucfirst($conge->type) }}</td>
                    <td>
                        <a href="{{ route('conges.show', $conge->id) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('conges.destroy', $conge->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $conges->links() }}
    <a href="{{ route('conges.create') }}" class="btn btn-primary">Demander un Congé</a>
@endsection
